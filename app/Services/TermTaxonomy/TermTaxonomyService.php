<?php


namespace App\Services\TermTaxonomy;

use App\Constants\General;
use App\Repositories\TermTaxonomyRepository;
use App\Services\Contracts\BaseService;
use Illuminate\Http\Request;

use App\Models\WP\TermTaxonomy;
use App\Models\WP\Term;
use App\Models\WP\TermRelation;
use App\Models\WP\Post;
use App\Models\WP\PostMeta;
use App\Models\WP\Option;
use Carbon\Carbon;
use App\Models\WP\AttributeTaxonomy;
use App\Models\WP\TermMeta;
use App\Http\Controllers\ImgController;
use Illuminate\Support\Facades\File;


/**
 * Class TermTaxonomyService
 * @package App\Services\TermTaxonomy
 */
class TermTaxonomyService extends BaseService implements ITermTaxonomyService
{
    /**
     * TermTaxonomyService constructor.
     * @param TermTaxonomyRepository $repository
     */
    public function __construct(TermTaxonomyRepository $repository)
    {
        parent::__construct($repository);
    }

    /** gets categories  and sub cateogies from termtaxonomy and terms table
     * @param int $supplier_id optional
     * @return Collection
     */
    public function categories_and_sub($supplier_id=null){
        return TermTaxonomy::whereIn('taxonomy',['product_cat'])->when($supplier_id,function($query,$supplier_id){
            return $query->where('supplier_id',$supplier_id);
        })->get();

    }
    /** gets categories from termtaxonomy and terms table
     *
     */
    public function categories(){
        return TermTaxonomy::whereIn('taxonomy',['product_cat'])->where('parent',0)->get();
    }

    /** gets tags from termtaxonomy and terms table
     * @param int $supplier_id optional
     * @return Collection
     */
    public function tags($supplier_id=null){
        return TermTaxonomy::whereIn('taxonomy',['product_tag'])->when($supplier_id,function($query,$supplier_id){
            return $query->where('supplier_id',$supplier_id);
        })->get();
    }

     /** gets Attributes from termtaxonomy and terms table
     * @return Collection
     */
    public function attributes($supplier_id=null){
        
        return TermTaxonomy::where('taxonomy','like','pa_%')
                            ->groupBy('taxonomy')
                            ->when($supplier_id, function ($query, $supplier_id) {
                                return $query->where('supplier_id', $supplier_id);
                            })->get();
    }

     /** stores category info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function storeCategory(Request $request,$supplier_id=null){

        $term = Term::create([
            'name'=>$request->name,
            'slug'=>str_replace(' ','-',$request->name),
            'item_group'=>0
        ]);
        $term_taxonomy = TermTaxonomy::create([
            'term_id'=>$term->term_id,
            'taxonomy'=>$request->type,
            'description'=>$request->description,
            'parent'=>$request->parent??0,
            'supplier_id'=>$supplier_id
        ]);
        //savge image
            $file = $request->file('image');
            if($file){
                $this->store_image($file,$request,$term);
            }


        return $term_taxonomy;
    }

    /** stores taxonomy info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function store(Request $request , $supplier_id=null){
        
        $term = Term::create([
            'name'=>$request->name,
            'slug'=>str_replace(' ','-',$request->name),
            'item_group'=>0,
        

        ]);
        
        $term_taxonomy = TermTaxonomy::create([
            'term_id'=>$term->term_id,
            'taxonomy'=>$request->taxonomy,
            'description'=>$request->description ?? ' ',
            'parent'=>0,
            "supplier_id"=>$supplier_id
        ]);
        //dd($term_taxonomy);
        if(isset($request->type) && $request->type=="attributes"){
            $new_taxonomy = AttributeTaxonomy::create([
                'attribute_name'=>$request->name,
                'attribute_label'=>$request->name,
                'attribute_type'=>'select',
                'attribute_public'=>'0',
                'attribute_orderby'=>'menu_order',
                'term_taxonomy_id'=>$term_taxonomy->term_taxonomy_id,
                'supplier_id'=>$supplier_id
            ]);
            $option_name = '_transient_wc_attribute_taxonomies';
            $option = Option::where('option_name',$option_name)->first();
            return $option;
            $option_value = unserialize($option->option_value);
            array_push($option_value,(object)[
                'attribute_name'=>$request->name,
                'attribute_label'=>$request->name,
                'attribute_type'=>'select',
                'attribute_public'=>'0',
                'attribute_orderby'=>'menu_order',
            ]);
            //dd($option_value);
            \DB::table(\General::DB_PREFIX."options")
            ->where('option_name',$option_name)
            ->update([
                'option_value'=>serialize($option_value)
            ]);

        }

        return $term_taxonomy;
    }


    public function delete($id){
        $term_taxonomy = TermTaxonomy::where('term_taxonomy_id',$id)->first();
        if($term_taxonomy){
            $term_taxonomy->term->delete();
          return  $term_taxonomy->delete();

        }
        return false;
    }


    public function update(Request $request, $id)
    {
        $term_taxonomy = TermTaxonomy::where('term_taxonomy_id',$id)->first();

        \DB::table(\General::DB_PREFIX.'term_taxonomy')
            ->where('term_taxonomy_id', $id)
            ->update([
                'description'=>$request->description,
                'parent'=>$request->parent ?? 0,
                "supplier_id"=>$request->supplier_id ?? $term_taxonomy->supplier_id

            ]);

            if(isset($request->type) && $request->type=="attributes"){
                \Db::table(\General::DB_PREFIX."woocommerce_attribute_taxonomies")
                ->where('term_taxonomy_id',$id)
                ->update([
                    'attribute_name'=>$request->name,
                    'attribute_label'=>$request->name,
                ]);

            }
            $term = $term_taxonomy->term;

            if($request->hasFile('image')){
                $file = $request->file('image');
                if($file){
                    $this->store_image($file,$request,$term);
                }
            }

         return \DB::table(\General::DB_PREFIX.'terms')
            ->where('term_id', $term->term_id)
            ->update([
                'name'=>$request->name,
                'slug'=>str_replace(' ','-',$request->name),
            ]);

    }

     /** update attrbiute info
     * @param Request $request
     * @return TermTaxonomy
     */
    public function updateAttribute(Request $request,$id){
        $term_taxonomy = TermTaxonomy::where('term_taxonomy_id',$id)->first();
        \DB::table(\General::DB_PREFIX.'term_taxonomy')
            ->where('term_taxonomy_id', $id)
            ->update([
                'taxonomy'=>$request->taxonomy,

            ]);

        $term = $term_taxonomy->term;
       return  \DB::table(\General::DB_PREFIX.'terms')
        ->where('term_id', $term->id)
        ->update([
            'name'=>$request->name,
            'slug'=>str_replace(' ','-',$request->name),

        ]);

    }
/** stores the data into wpug_postmeta table in wordpress
     * @param int $post_id the id of the post
     * @param int $meta_key the key name of the attribute
     * @param int $meta_value the real value of the attribute
     */
    private function creatPostMeta($post_id,$meta_key,$meta_value){
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
    private function store_image($file,Request $request,Term $term){
        

        //Optimized By Blaxk

        // $now = Carbon::now();
        // $path = 'wp-content/uploads';
        // $name =  $file->getClientOriginalName();
        // $extension = $file->getClientOriginalExtension();
        // $mdf5 = md5($name.'_'.time()).'.'.$extension;
        // $guid = General::IMAGE_URL.'/wp-content/uploads/'.$mdf5;
        // if(!File::isDirectory('../../'.str_replace('vendor','',public_path($path)))){
        //     File::makeDirectory('../../'.str_replace('vendor','',public_path($path)), 0777, true, true);
        // }
        // //$destination_path = "/home2/alyamanl/public_html/alyaman/".$path;
        // $destination_path= 'wp-content/uploads';
        // $file->move($destination_path, $mdf5);
        // $image_post = Post::updateOrCreate([
        //     'post_title'=>$request->name,
        //     'post_author'=>\Auth::user()->wordpress_user->ID,
        // ],[
        //     'post_author'=>\Auth::user()->wordpress_user->ID,
        //     'post_parent'=>0,
        //     'post_date'=>now(),
        //     'post_date_gmt'=>now(),
        //     'post_content'=>"",
        //     'post_title'=>$request->name,
        //     'post_name'=>$mdf5,
        //     'post_status'=>'inherit',
        //     'comment_status'=>'closed',
        //     'ping_status'=>'closed',
        //     'post_type'=>'attachment',
        //     'post_excerpt'=>'',
        //     'to_ping'=>"",
        //     'pinged'=>'',
        //     'post_content_filtered'=>'',
        //     'post_modified'=>now(),
        //     'post_modified_gmt'=>now(),
        //     'guid'=>$guid,
        //     'post_mime_type'=>'image/'.$extension
        // ]);
        // TermMeta::updateOrCreate(
        //     [
        //         'term_id'=>$term->term_id,
        //         'meta_key'=>'thumbnail_id'
        //     ]
        //     ,[
        //     'term_id'=>$term->term_id,
        //     'meta_key'=>'thumbnail_id',
        //     'meta_value'=>$image_post->ID
        // ]);
        // $this->creatPostMeta($image_post->ID,'_wp_attached_file',$mdf5);
        // $this->creatPostMeta($image_post->ID,'_wp_attachment_metadata',$image_post->ID);
        // $this->creatPostMeta($image_post->ID,'_wc_attachment_source',$guid);

        $img0=new ImgController;
        $image_post=$img0->SaveImg($file);
        $mdf5=$image_post->slug;
        $guid=$image_post->source_url;
        // if($type=="main")


        TermMeta::updateOrCreate(
            [
                'term_id'=>$term->term_id,
                'meta_key'=>'thumbnail_id'
            ]
            ,[
            'term_id'=>$term->term_id,
            'meta_key'=>'thumbnail_id',
            'meta_value'=>$image_post->id
        ]);


        //$this->creatPostMeta($post_id,'_thumbnail_id',$image_post->id);
        $this->creatPostMeta($image_post->id,'_wp_attached_file',$mdf5);
        $this->creatPostMeta($image_post->id,'_wp_attachment_metadata',$image_post->id);
        $this->creatPostMeta($image_post->id,'_wc_attachment_source',$guid);

    }
}
