<?php


namespace App\Services\Post;


use App\Services\Contracts\IBaseService;
use Illuminate\Http\Request;
use App\Models\WP\Post;

/**
 * Interface IPostService
 * @package App\Services\Post
 */
interface IPostService extends IBaseService
{
    /** stores new product in posts wordpress table
     * @param Request $request
     * @return Post created post
     */
    public function store_product(Request $request);
    /** stores  product general info  in posts wordpress table
     * @param Request $request
     * @return Post  post
     */
    public function store_product_general(Request $request , int $post_id);
     /** stores  product inventory info  in posts wordpress table
     * @param Request $request
     * @return Post  post
     */
    public function store_product_inventory(Request $request , int $post_id);

    /** stores  product shipping info  in posts wordpress table
     * @param Request $request
     * @return Post  post
     */
    public function store_product_shipping(Request $request , int $post_id);



    /** stores  product attributes  in posts wordpress table
     * @param Request $request
     * @return Post  post
     */
    public function store_product_attributes(Request $request , int $post_id);


     /** update product's data  in posts wordpress table
     * @param Request $request
     * @param $post_id
     * @return Post updated post
     */
    public function update_product(Request $request,$post_id);

    /** get all products for a supplier
     * @param $post_author the wordpress user id for a supplier
     * @return Collection of posts which represents the products for a supplier
     */
    public function get_products_for_supplier(int $post_author);

    /** find  product for a supplier
     * @param $post_id the product  id to find
     * @param $post_author the wordpress user id for a supplier
     * @return Post or the porduct
     */
    public function find_product_for_supplier(int $post_id,$post_author);

}
