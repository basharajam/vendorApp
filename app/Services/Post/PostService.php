<?php


namespace App\Services\Post;

use App\Constants\General;
use App\Repositories\PostRepository;
use App\Services\Contracts\BaseService;
use Illuminate\Http\Request;
use App\Models\WP\Post;
use App\Models\WP\PostMeta;
use App\Models\WP\TermRelation;
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
            'post_content'=>$request->post_content,
            'post_title'=>$request->post_title,
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
            'guid'=>General::URL.'/?post_type=product&p='.$post->ID
        ]);


        $term_taxonomy_id = 0;
        if($request->product_type == 'simple'){
            $term_taxonomy_id = 2;
            //$this->saveProductSimpleAttributes($request,$post);
        }
        else if($request->product_type=='variable'){
            $term_taxonomy_id = 4;
        }
        // save product type : simple or variable
        TermRelation::create([
            'object_id'=>$post->ID,
            'term_taxonomy_id'=>$term_taxonomy_id,
            'term_order'=>0
        ]);
        // //save product category
        // TermRelation::create([
        //     'object_id'=>$post->ID,
        //     'term_taxonomy_id'=>$request->product_category,
        //     'term_order'=>0
        // ]);


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
                'post_content'=>$request->product_description,
                'post_title'=>$request->product_name,
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
                $this->saveProductSimpleAttributes($request,$post);
            }
            else if($request->product_type=='variable'){
                $term_taxonomy_id = 4;
            }
            //save product category
            if($request->product_category != $post->category->term_taxonomy_id){
                \DB::table('wpug_term_relationships')->where('object_id', $post->ID)
                                                    ->where('term_taxonomy_id',$post->category->term_taxonomy_id)
                                                    ->delete();
                TermRelation::create([
                    'object_id'=>$post->ID,
                    'term_taxonomy_id'=>$request->product_category,
                    'term_order'=>0
                ]);
            }
    }
    public function store_product_general(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);

        if($post){
            $this->creatPostMeta($post->ID,'_regular_price',$request->_regular_price);
            $this->creatPostMeta($post->ID,'_sale_price',$request->_sale_price);
            $this->creatPostMeta($post->ID,'material',$request->material);
            $this->creatPostMeta($post->ID,'thickness',$request->thickness);
            $this->creatPostMeta($post->ID,'printing_single',$request->printing_single);
            $this->creatPostMeta($post->ID,'size',$request->size);
            $this->creatPostMeta($post->ID,'supplier_name',$request->supplier_name);

        }
        return $post;
    }

    public function store_product_inventory(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);
        if($post){
            $this->creatPostMeta($post->ID,'_sku',$request->_sku);
            $this->creatPostMeta($post->ID,'_stock_status',$request->_stock_status);
            $this->creatPostMeta($post->ID,'_sold_individually',$request->_sold_individually);
            $this->creatPostMeta($post->ID,'_wc_min_qty_product',$request->_wc_min_qty_product);
            $this->creatPostMeta($post->ID,'_wc_max_qty_product',$request->_wc_max_qty_product);
            $this->creatPostMeta($post->ID,'cartoon_qty',$request->cartoon_qty);
            $this->creatPostMeta($post->ID,'price_for',$request->price_for);
            $this->creatPostMeta($post->ID,'price_for_input',$request->price_for_input);
            $this->creatPostMeta($post->ID,'mix_of_package',$request->mix_of_package);
        }
        return $post;
    }
    public function store_product_shipping(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);
        if($post){
            $this->creatPostMeta($post->ID,'_weight',$request->_weight);
            $this->creatPostMeta($post->ID,'_length',$request->_length);
            $this->creatPostMeta($post->ID,'_width',$request->_width);
            $this->creatPostMeta($post->ID,'_height',$request->_height);
            $this->creatPostMeta($post->ID,'cbm_single',$request->cbm_single);
            $this->creatPostMeta($post->ID,'days_to_delivery',$request->days_to_delivery);
        }
        return $post;
    }
    public function store_product_attributes(Request $request , int $post_id){
        $post = $this->find_product_for_supplier($post_id,$request->post_author);
        if($post){
          foreach($request->taxonomies_relation as $term_taxonomy_id){
            TermRelation::create([
                'object_id'=>$post->ID,
                'term_taxonomy_id'=>$term_taxonomy_id,
                'term_order'=>0
            ]);
          }
        }
        return $post;
    }
    /** get all products for a supplier
     * @param $post_author the wordpress user id for a supplier
     * @return Collection of posts which represents the products for a supplier
     */
    public function get_products_for_supplier(int $post_author){
        return Post::where('post_author',$post_author)->get();
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
        $post = Post::where('ID',$id)->first();
        //delete term relation
        $terms = TermRelation::where('object_id',$id)->get();
        if($terms){
            foreach($terms as $term){
                $term->delete();
            }
        }
        $post_meta = PostMeta::where('post_id',$id)->get();
        if($post_meta){
            foreach($post_meta as $meta){
                $meta->delete();
            }
        }
        //delete post meta
        return $post->delete();
    }

    /** stores simple product attributes in post_meta table in wordpress
     * @param  $request that has the data
     * @param $post : it's the product that we want to create the meta data for
     */
    private function saveProductSimpleAttributes($request,$post){
        $this->creatPostMeta($post->ID,'product_number',$request->product_number);
        isset($request->product_features) ? $this->creatPostMeta($post->ID,'product_features',$request->product_features):'';
        $this->creatPostMeta($post->ID,'product_price',$request->product_price);
        isset($request->product_price_after_discount) ? $this->creatPostMeta($post->ID,'product_price_after_discount',$request->product_price_after_discount):'';
        //نوع المنتج
        isset($request->type) ? $this->creatPostMeta($post->ID,'type',$request->type):'';
        isset($request->product_thikness) ? $this->creatPostMeta($post->ID,'product_thikness',$request->product_thikness):'';
        isset($request->product_print) ? $this->creatPostMeta($post->ID,'product_print',$request->product_print):'';
        $this->creatPostMeta($post->ID,'product_size',$request->product_size);
        $this->creatPostMeta($post->ID,'product_min_order_number',$request->product_min_order_number);
        isset($request->product_max_order_number) ? $this->creatPostMeta($post->ID,'product_max_order_number',$request->product_max_order_number):'';
        $this->creatPostMeta($post->ID,'product_unit_price',$request->product_unit_price);
        $this->creatPostMeta($post->ID,'product_count_per_unit',$request->product_count_per_unit);
        $this->creatPostMeta($post->ID,'product_model_count_per_unit',$request->product_model_count_per_unit);
        $this->creatPostMeta($post->ID,'weight',$request->weight);
        $this->creatPostMeta($post->ID,'cbm',$request->cbm);
        $this->creatPostMeta($post->ID,'delivery_dates_count',$request->delivery_dates_count);

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
}
