<?php

namespace  App\Repositories;

use App\Repositories\Contracts\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
     public function __construct(User $user)
    {
        parent::__construct($user);
    }
}





