<?php

namespace  App\Repositories;

use App\Repositories\Contracts\BaseRepository;
use App\Models\WP\Post;

class PostRepository extends BaseRepository
{
     public function __construct(Post $post)
    {
        parent::__construct($post);
    }
}





