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

    /** get all products for a supplier
     * @param $post_author the wordpress user id for a supplier
     * @return Collection of posts which represents the products for a supplier
     */
    public function get_products_for_supplier(int $post_author);

}
