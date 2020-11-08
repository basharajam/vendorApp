<?php


namespace App\Services\Post;


use App\Repositories\PostRepository;
use App\Services\Contracts\BaseService;

use App\Models\WP\Post;

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

}
