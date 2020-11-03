<?php


namespace App\Services\User;


use App\Repositories\UserRepository;
use App\Services\Contracts\BaseService;

use App\Models\User;

/**
 * Class UserService
 * @package App\Services\User
 */
class UserService extends BaseService implements IUserService
{
    /**
     * UserService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

}
