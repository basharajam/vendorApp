<?php


namespace App\Services\Post;


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
        $post->update([
            'guid'=>' https://test.alyamanlive.com/?post_type=product&p='.$post->ID
        ]);


        $term_taxonomy_id = 0;
        if($request->product_type == 'simple'){
            $term_taxonomy_id = 2;
            $this->saveProductSimpleAttributes($request,$post);
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
        //save product category
        TermRelation::create([
            'object_id'=>$post->ID,
            'term_taxonomy_id'=>$request->product_category,
            'term_order'=>0
        ]);

        // save product attributes

        return $post;

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
        PostMeta::create([
            'post_id'=>$post_id,
            'post_meta'=>$meta_key,
            'post_value'=>$meta_value
        ]);
    }
}
