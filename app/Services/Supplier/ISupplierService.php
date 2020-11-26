<?php


namespace App\Services\Supplier;


use App\Services\Contracts\IBaseService;

/**
 * Interface ISupplierService
 * @package App\Services\Supplier
 */
interface ISupplierService extends IBaseService
{

    /** get all manager's suppliers
     * @param $manager_id Supplier Manager
     * @return mixed
     */
    public function getSuppliersForManager($manager_id);
}
