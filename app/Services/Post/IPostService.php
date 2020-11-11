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
}
