<?php


namespace App\Services\Post;

use App\Constants\General;
use App\Repositories\PostRepository;
use App\Services\Contracts\BaseService;
use Illuminate\Http\Request;
use App\Models\WP\Post;
use App\Models\WP\PostMeta;
use App\Models\Property;
use Carbon\Carbon;
use App\Models\WP\TermRelation;
use App\Models\WP\TermTaxonomy;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rules\Exists;
use App\Models\Supplier;
use App\Models\WP\Option;
use Illuminate\Auth\EloquentUserProvider;

/**
 * Class PostService
 * @package App\Services\Post
 */
class PostService extends BaseService implements IPostService
{
    /**
     * PostService constructor.
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        parent::__construct($repository);
    }
    public function store_gallery(Request $request,$post_id){
        $post = Post::where('ID',$post_id)->first();
        $files = $request->file('gallery');
        if($files){
           foreach ($files as $file) {
               $image = $this->store_post_image($post->ID,$file,'gallery');
               $meta =  PostMeta::where('post_id',$post->ID)->where('meta_key','_product_image_gallery')->first();
               if($meta){
                   $meta->update([
                       'meta_value'=>$meta->meta_value .','.$image->ID,
                   ]);
               }
               else{
                 $meta =  PostMeta::Create([
                       'post_id'=>$post->ID,
                       'meta_key'=>'_product_image_gallery',
                       'meta_value'=>$image->ID
                   ]);
               }
           }
       }

    }

    /** stores new product in posts wordpress table
     * @param Request $request
     * @return Post created post
     */
    public function store_product(Request $request):Post{
        //create product
        $post = Post::create([
            'post_author'=>\Auth::user()->wordpress_user->ID,
            'post_date'=>now(),
            'post_date_gmt'=>now(),
            'post_content'=>$request->post_content ?? '',
            'post_title'=>$request->post_title,
            'post_name'=>str_replace(' ','-',$request->post_title),
            'post_status'=>'publish',
            'comment_status'=>'closed',
            'ping_status'=>'closed',
            'post_type'=>'product',
            'post_excerpt'=>'',
            'to_ping'=>"",
            'pinged'=>'',
            'post_content_filtered'=>'',
            'post_modified'=>now(),
            'post_modified_gmt'=>now()
        ]);
        $post->update([
            // 'guid'=>General::URL.'/?post_type=product&p='.$post->ID
            'guid'=>General::URL.'/product/'.$post->post_name,
        ]);
        if($request->hasFile('thumbnail')){
            $this->store_post_image($post->ID,$request->file('thumbnail'),'main');
        }

        $term_taxonomy_id = 0;
         if($request->product_type == 'simple'){
            $term_taxonomy_id = 280;
        }
        else if($request->product_type=='variable'){
            $term_taxonomy_id = 282;
        }

        // save product type : simple or variable
        TermRelation::create([
            'object_id'=>$post->ID,
            'term_taxonomy_id'=>$term_taxonomy_id,
            'term_order'=>0
        ]);

        return $post;

    }

    /** stores new product variation in posts wordpress table
     * @param Request $request
     * @return Post created post
     */
    public function store_product_variation(Request $request){
        $post_parent = $this->find_product_for_supplier($request->post_parent,\Auth::user()->wordpress_user->ID);
        $post_title_appendix = ' - ';
        $attributes_values = $request->attributes_values;
        $post_excerpt = '';
   
            //attribute is the term_taxonomy_id
            if($attributes_values!=0){
                $taxonomy = TermTaxonomy::where('term_taxonomy_id',$attributes_values)->first();
                $post_excerpt .=str_replace('pa_','',$taxonomy->taxonomy).": ".$taxonomy->term->name;
                $post_title_appendix .= $taxonomy->term->name;
                // if(next($attributes_values)){
                //     $post_title_appendix.=' , ';
                //     $post_excerpt.="\n";
                // }
            }

      
        $post_title = $post_parent->post_title .$post_title_appendix;
        $post = Post::create([
            'post_author'=>\Auth::user()->wordpress_user->ID,
            'post_parent'=>$request->post_parent,
            'post_date'=>now(),
            'post_date_gmt'=>now(),
            'post_content'=>'',
            'post_title'=>$post_title,
            'post_name'=>str_replace(' ','-',$post_title),
            'post_status'=>'publish',
            'comment_status'=>'closed',
            'ping_status'=>'closed',
            'post_type'=>'product_variation',
            'post_excerpt'=>$post_excerpt,
            'to_ping'=>"",
            'pinged'=>'',
            'post_content_filtered'=>'',
            'post_modified'=>now(),
            'post_modified_gmt'=>now()
        ]);
        $post->update([
            // 'guid'=>General::URL.'/?post_type=product_variation&#038;p='.$post->ID
            'guid'=>General::URL.'/product'.$post->post_name
        ]);
        //create term relation foreach attribute
   
            if($attributes_values!=0)
            {
                //attribute is the term_taxonomy_id
                $taxonomy = TermTaxonomy::where('term_taxonomy_id',$attributes_values)->first();
                TermRelation::create([
                    'object_id'=>$post->ID,
                    'term_taxonomy_id'=>$taxonomy->term_taxonomy_id,
                    'term_order'=> 0
                ]);
                //

                $this->creatPostMeta($post->ID,'attribute_'.$taxonomy->taxonomy,$taxonomy->term->name);
            }
 
        //store option
        $option_name = "_transient_wc_product_children_".$post_parent->ID;
        $prices_option_name = "_transient_wc_var_prices_".$post_parent->ID;
        $option = Option::where('option_name',$option_name)->first();
        $option_prices = Option::where('option_name',$prices_option_name)->first();
        if($option_prices){
            $options_table_name= \General::DB_PREFIX.'options';
                    \DB::delete("DELETE From ".$options_table_name." where option_name = '".$prices_option_name."'");
        }

        $option_value=[];
        //if it's null create new option and this is the first variation in this product
        if(!$option){
            array_push($option_value,(object)[
                "all"=>[$post->ID],
                "visible"=>[$post->ID]
            ]);
           $option =  Option::create([
                'option_name'=>$option_name,
                'option_value'=>serialize($option_value)
            ]);
        }
        else{

            
            $option_value = unserialize($option->option_value);
            array_push($option_value[0]->all,$post->ID);
            array_push($option_value[0]->visible,$post->ID);
            \DB::table(\General::DB_PREFIX."options")
            ->where('option_name',$option_name)
            ->update([
                'option_value'=>serialize($option_value)
            ]);
        }
        
        return $post;

        
    }

     /** update product's data  in posts wordpress table
     * @param Request $request
     * @param $post_id
     * @return Post updated post
     */
    public function update_product(Request $request,$post_id){

        $post = Post::where('ID',$post_id)->first();
        $post->update([
                'post_author'=>\Auth::user()->wordpress_user->ID,
                'post_date'=>now(),
                'post_date_gmt'=>now(),
                'post_content'=>$request->post_content ?? '',
                'post_title'=>$request->post_title,
                'post_name'=>str_replace(' ','-',$request->post_title),
                'post_status'=>'publish',
                'comment_status'=>'closed',
                'ping_status'=>'closed',
                'post_type'=>'product',
                'post_excerpt'=>'',
                'to_ping'=>"",
                'pinged'=>'',
                'post_content_filtered'=>'',
                'post_modified'=>now(),
                'post_modified_gmt'=>now()
            ]);

            if($request->product_type == 'simple'){
                $term_taxonomy_id = 2;
            }
            else if($request->product_type=='variable'){
                $term_taxonomy_id = 4;
            }
            if($request->hasFile('thumbnail')){
                $this->store_post_image($post->ID,$request->file('thumbnail'),'main');
            }

            if($post->product_type==null){
                TermRelation::create([
                    'object_id'=>$post->ID,
                    'term_taxonomy_id'=>$term_taxonomy_id,
                    'term_order'=>0
                ]);
            }


            return $post;
    }
    public function store_product_general(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);

        if($post){
            $this->creatPostMeta($post->ID,'_regular_price',$request->_regular_price);
            $this->creatPostMeta($post->ID,'_sale_price',$request->_sale_price);
            if($request->product_type == 'simple'){
                $this->creatPostMeta($post->ID,'_price',$request->_sale_price ?? $request->_regular_price);
            }
            else if($request->product_type=='variable'){
                $this->creatPostMeta($post->ID,'_price',$request->_regular_price);
            }
            $this->creatPostMeta($post->ID,'al_material',$request->al_material);
            $this->creatPostMeta($post->ID,'al_thickness',$request->al_thickness);
            $this->creatPostMeta($post->ID,'al_printing',$request->al_printing);
            $this->creatPostMeta($post->ID,'al_size',$request->al_size);
            $this->creatPostMeta($post->ID,'al_supplier_name',$request->al_supplier_name);
            $this->creatPostMeta($post->ID,'al_added ',$request->al_added );
            $this->creatPostMeta($post->ID,'al_more_info ',$request->al_more_info);
            $this->creatPostMeta($post->ID,'al_color',$request->al_color);

        }
        if($post->post_parent){
            $prices_option_name = "_transient_wc_var_prices_".$post->post_parent;
            $option_prices = Option::where('option_name',$prices_option_name)->first();
            if($option_prices){
                $option_prices->delete();
            }
        }
        return $post;
    }

    public function store_product_inventory(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);
        if($post){
            $this->creatPostMeta($post->ID,'_sku',$request->_sku);
            $this->creatPostMeta($post->ID,'_stock_status',$request->_stock_status);
            $this->creatPostMeta($post->ID,'_wc_min_qty_product',$request->_wc_min_qty_product);
            $this->creatPostMeta($post->ID,'_wc_max_qty_product',$request->_wc_max_qty_product);
            $this->creatPostMeta($post->ID,'al_carton_qty',$request->al_carton_qty);
            $this->creatPostMeta($post->ID,'al_price_for',$request->al_price_for);
            $this->creatPostMeta($post->ID,'al_price_for_desc',$request->al_price_for_desc);
            $this->creatPostMeta($post->ID,'al_mix_of_package',$request->al_mix_of_package);
        }
        return $post;
    }
    public function store_product_shipping(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);
        if($post){
            $this->creatPostMeta($post->ID,'_weight',$request->_weight);
            $this->creatPostMeta($post->ID,'al_cbm',$request->al_cbm);
            $this->creatPostMeta($post->ID,'al_days_to_delivery',$request->al_days_to_delivery);
        }
        return $post;
    }
    public function store_product_attributes(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);
        //dd($request);
        $meta_key = "_product_attributes";
        $meta = PostMeta::where('meta_key',$meta_key)->where('post_id',$post_id)->first();
        $taxonomy =TermTaxonomy::where('term_taxonomy_id',$request->term_taxonomy_id)->first();
        if(!$meta){
            PostMeta::create([
                "post_id"=>$post_id,
                "meta_key"=>$meta_key,
                "meta_value"=>serialize([
                    $taxonomy->taxonomy=>[
                        "name"=>$taxonomy->taxonomy,
                        "value"=>"",
                        "is_visible"=>1,
                        "is_variation"=>1,
                        "is_taxonomy"=>1
                    ]
                ])
            ]);
        }
        else{
            $meta_value  = unserialize($meta->meta_value);
            $meta_value[$taxonomy->taxonomy] = [
                "name"=>$taxonomy->taxonomy,
                "value"=>"",
                "is_visible"=>1,
                "is_variation"=>1,
                "is_taxonomy"=>1
            ];
            \DB::table(\General::DB_PREFIX."postmeta")
            ->where('meta_key',$meta_key)->where('post_id',$post_id)
            ->update([
                'meta_value'=>serialize($meta_value)
            ]);
        }
        return  $post;

    }
     /** stores  product attributes relations  in posts wordpress table
     * @param Request $request
     * @return Post  post
     */
    public function store_product_attributes_relation(Request $request , int $post_id){

        
        $post = $this->find_product_for_supplier($post_id,$request->post_author);
        if($post && isset($request->taxonomies_relation)){
          foreach($request->taxonomies_relation as $term_taxonomy_id){
            //store termRelation
           $taxonomy =TermTaxonomy::where('term_taxonomy_id',$term_taxonomy_id)->first();
            $exists = TermRelation::where('object_id',$post->ID)->where('term_taxonomy_id',$term_taxonomy_id)->first();
            if($exists==null){
               $attribute =  TermRelation::create([
                    'object_id'=>$post->ID,
                    'term_taxonomy_id'=>$term_taxonomy_id,
                    'term_order'=>0
                ]);
                $meta_key = "_product_attributes";
                $meta = PostMeta::where('meta_key',$meta_key)->where('post_id',$post_id)->first();
                if($meta){
                    $meta_value  = unserialize($meta->meta_value);
                   if( $meta_value[$taxonomy->taxonomy]){
                    $meta_value[$taxonomy->taxonomy]['value']=$taxonomy->term->name;
                    $meta_value[$taxonomy->taxonomy]['is_taxonomy']=0;
                   }
                   \DB::table(\General::DB_PREFIX."postmeta")
                   ->where('meta_key',$meta_key)->where('post_id',$post_id)
                   ->update([
                       'meta_value'=>serialize($meta_value)
                   ]);
                }
            }

          }
        }
        return $post;
    }
    public function store_product_categories(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);
        if($post){
            /*
            Store Categories
            */
            if($request->product_categories){
                foreach($request->product_categories as $term_taxonomy_id){
                    TermRelation::updateOrCreate(
                        [
                            'term_taxonomy_id'=>$term_taxonomy_id,
                            'object_id'=>$post->ID,
                        ]
                        ,[
                        'object_id'=>$post->ID,
                        'term_order'=>0
                    ]);
                }
                if($post->categories && count($request->product_categories) < count($post->categories) ){
                    foreach($post->categories as $cat){
                        if(!in_array($cat->term_taxonomy_id,$request->product_categories)){
                            $term = TermRelation::where('object_id',$post->ID)->where('term_taxonomy_id',$cat->term_taxonomy_id)->first();
                            $table_name = \General::DB_PREFIX."term_relationships";
                            if($term){
                                \DB::delete("DELETE From ".$table_name." where object_id =".$post->ID." and term_taxonomy_id =".$cat->term_taxonomy_id);
                            }
                        }
                    }
                   }
            }
            else
            {
                if($post->categories){
                    foreach($post->categories as $cat) {
                        $term = TermRelation::where('object_id',$post->ID)->where('term_taxonomy_id',$cat->term_taxonomy_id)->first();
                        $table_name = \General::DB_PREFIX."term_relationships";
                        if($term){
                            \DB::delete("DELETE From ".$table_name." where object_id =".$post->ID." and term_taxonomy_id =".$cat->term_taxonomy_id);
                        }
                    }
                }
            }

            /** End of Store Categories */

        }

        return $post;
    }
    public function store_product_tags(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);
        if($post){
            if($request->product_tags){
                foreach($request->product_tags as $term_taxonomy_id){
                    TermRelation::updateOrCreate(
                        [
                            'term_taxonomy_id'=>$term_taxonomy_id,
                            'object_id'=>$post->ID,
                        ]
                        ,[
                        'object_id'=>$post->ID,
                        'term_order'=>0
                    ]);
                }
                if($post->tags && count($request->product_tags) < count($post->tags) ){
                    foreach($post->tags as $tag){
                        if(!in_array($tag->term_taxonomy_id,$request->product_tags)){
                            $term = TermRelation::where('object_id',$post->ID)->where('term_taxonomy_id',$tag->term_taxonomy_id)->first();
                            $table_name = \General::DB_PREFIX."term_relationships";
                            if($term){
                                \DB::delete("DELETE From ".$table_name." where object_id =".$post->ID." and term_taxonomy_id =".$tag->term_taxonomy_id);
                            }
                        }
                    }
                   }
            }
            else
            {
                if($post->tags){
                    foreach($post->tags as $tag) {
                        $term = TermRelation::where('object_id',$post->ID)->where('term_taxonomy_id',$tag->term_taxonomy_id)->first();
                        $table_name = \General::DB_PREFIX."term_relationships";
                        if($term){
                            \DB::delete("DELETE From ".$table_name." where object_id =".$post->ID." and term_taxonomy_id =".$tag->term_taxonomy_id);
                        }
                    }
                }
            }
        }

        return $post;
    }
    /** get all products for a supplier
     * @param $post_author the wordpress user id for a supplier
     * @return Collection of posts which represents the products for a supplier
     */
    public function get_products_for_supplier(int $post_author){
        return Post::where('post_author',$post_author)->where('post_type','product')->get()->append('product_attributes');
    }

    //By Blaxk
    public function get_product_variation(int $post_author,int $post_parent)
    {
      
        return Post::where('post_author',$post_author)->where('post_parent',$post_parent)->get();

    }

    /** find  product for a supplier
     * @param $post_id the product  id to find
     * @param $post_author the wordpress user id for a supplier
     * @return Post or the product
     */
    public function find_product_for_supplier(int $post_id,$post_author){

        
        return Post::where('post_author',$post_author)
                    ->where('ID',$post_id)
                    ->first();
    }

    /** delete rpoducts with all it's related data
     * @param $id product id (post_id)
     */
    public function delete($id){


        //Updated By Blaxk
        $post = Post::where('ID',$id)->first();

        //Delete Product Variation first
        if($post->product_type && $post->product_type->term->name ==='variable'){

            //get Product variation
            $ProdVariation=$this->get_product_variation($post->post_author,$post->ID);
            foreach($ProdVariation as $variation){

                //Delete TermRelations
                $DelTerm=TermRelation::where('object_id',$variation->ID)->delete();

                //Delete Variation PostMeta
                $DelPostMeta=PostMeta::where('post_id',$variation->ID)->delete();

                //Delete Variation
                $DeleteVariation=Post::where('ID',$variation->ID)->first();
                $DeleteVariation->delete();

                // $terms = TermRelation::where('object_id',$variation->ID)->get();
                // $table_name = \General::DB_PREFIX."term_relationships";
                // if($terms){
                //     TermRelation::where('object_id',$variation->ID)->delete();
                // }
                // $post_meta = PostMeta::where('post_id',$variation->ID)->get();
                // if($post_meta){
                //     foreach($post_meta as $meta){
                //         $meta->delete();
                //     }
                // }
                // $variation->delete();
            
            }

            //Updated By Blaxk
        }

        //delete parent product
        $terms = TermRelation::where('object_id',$id)->get();
        $table_name = \General::DB_PREFIX."term_relationships";
            if($terms){
                // \DB::delete("DELETE From ".$table_name." where object_id =".$id);
                TermRelation::where('object_id',$id)->delete();
            }
            $post_meta = PostMeta::where('post_id',$id)->get();
            if($post_meta){
                foreach($post_meta as $meta){
                //$meta->delete();
                }
            }

            //delete post
            return $post->delete();
    
    }

    /** stores the data into wpug_postmeta table in wordpress
     * @param int $post_id the id of the post
     * @param int $meta_key the key name of the attribute
     * @param int $meta_value the real value of the attribute
     */
    private function creatPostMeta($post_id,$meta_key,$meta_value){
        if($meta_value==null){
            $meta = PostMeta::where('meta_key',$meta_key)
                            ->where('post_id',$post_id)->first();
            $table_name = \General::DB_PREFIX.'postmeta';
            if($meta){
                \DB::delete("DELETE From ".$table_name." where meta_id =".$meta->meta_id);
            }
        }
        else{
            PostMeta::updateOrCreate(
                [
                    'post_id'=>$post_id,
                    'meta_key'=>$meta_key
                ]
                ,[
                'post_id'=>$post_id,
                'meta_key'=>$meta_key,
                'meta_value'=>$meta_value
            ]);
        }

    }
    private function store_post_image($post_id,$file,$type="main"){
        $now = Carbon::now();
        // $path = 'wp-content/uploads/'.$now->year.'/'.$now->month;
        // $path = 'wp-content/uploads';
        $path = '../../zhusdwcaru/public_html/wp-content/uploads/' .$now->year.'/'.$now->month;
        $name =  $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $mdf5 = md5($name.'_'.time()).'.'.$extension;
        // $guid = General::IMAGE_URL.'/wp-content/uploads/'.$mdf5;
        $guid = General::IMAGE_URL.$path.'/'.$mdf5;
       
        if(!File::isDirectory('../../'.str_replace('vendor','',public_path($path)))){
            File::makeDirectory('../../'.str_replace('vendor','',public_path($path)), 0777, true, true);

        }
        // $destination_path = "/home2/alyamanl/public_html/test/".$path;
        $file->move($path, $mdf5);
        // dd($guid);
        $image_post = $this->createAttachmentPost($post_id,$file->getClientOriginalName(),$guid,$extension,$mdf5);
        if($type=="main")
        $this->creatPostMeta($post_id,'_thumbnail_id',$image_post->ID);
        $this->creatPostMeta($image_post->ID,'_wp_attached_file',$mdf5);
        $this->creatPostMeta($image_post->ID,'_wp_attachment_metadata',$image_post->ID);
        $this->creatPostMeta($image_post->ID,'_wc_attachment_source',$guid);

        return $image_post;
    }

    private function createAttachmentPost($post_id,$title,$guid,$extension,$file_name){
        return Post::create([
            'post_author'=>\Auth::user()->wordpress_user->ID,
            'post_parent'=>$post_id,
            'post_date'=>now(),
            'post_date_gmt'=>now(),
            'post_content'=>"",
            'post_title'=>$title,
            'post_name'=>$file_name,
            'post_status'=>'inherit',
            'comment_status'=>'closed',
            'ping_status'=>'closed',
            'post_type'=>'attachment',
            'post_excerpt'=>'',
            'to_ping'=>"",
            'pinged'=>'',
            'post_content_filtered'=>'',
            'post_modified'=>now(),
            'post_modified_gmt'=>now(),
            'guid'=>$guid,
            'post_mime_type'=>'image/'.$extension
        ]);
    }
      /** get all products for a supplier manager
     * @param $manager_id the id a manager
     * @return Collection of posts which represents the products for a manager
     */
    public function get_products_for_supplier_manager(int $manager_id){
         $suppliers = Supplier::where('manager_id',$manager_id)->get();
         $suppliers_ids =[];
         foreach($suppliers as $supplier){
             array_push($suppliers_ids,$supplier->user->wordpress_user->ID);
         }
         return Post::whereIn('post_author',$suppliers_ids)
         ->whereIn('post_type',['product'])
         ->get();

    }

    public function save_product_props(int $post_id,string $username,Request $request)
    {
        //get Attributes
        $getProps=Property::where('PropUser',$username)->get();
        
        foreach ($getProps as $prop ) {
            
            //Check Prop Status 
            if($prop['PropStatus'] === 1){

                //Save Property as post meta 
                $this->creatPostMeta($post_id,$prop['PropName'],$prop['PropValue']);
            }
        }

    }
}
