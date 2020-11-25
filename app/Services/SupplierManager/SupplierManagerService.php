<?php


namespace App\Services\SupplierManager;


use App\Repositories\SupplierManagerRepository;
use App\Services\Contracts\BaseService;

use App\Models\SupplierManager;

/**
 * Class SupplierManagerService
 * @package App\Services\SupplierManager
 */
class SupplierManagerService extends BaseService implements ISupplierManagerService
{
    /**
     * SupplierManagerService constructor.
     * @param SupplierManagerRepository $repository
     */
    public function __construct(SupplierManagerRepository $repository)
    {
        parent::__construct($repository);
    }

}
