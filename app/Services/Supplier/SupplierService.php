<?php


namespace App\Services\Supplier;


use App\Repositories\SupplierRepository;
use App\Services\Contracts\BaseService;

use App\Models\Supplier;

/**
 * Class SupplierService
 * @package App\Services\Supplier
 */
class SupplierService extends BaseService implements ISupplierService
{
    /**
     * SupplierService constructor.
     * @param SupplierRepository $repository
     */
    public function __construct(SupplierRepository $repository)
    {
        parent::__construct($repository);
    }

}
