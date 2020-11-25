<?php


namespace App\Services\OrderItem;

use App\Services\Contracts\IBaseService;

/**
 * Interface IOrderItemService
 * @package App\Services\OrderItem
 */
interface IOrderItemService extends IBaseService
{
    /** get's all orders for a supplier
     * @param $supplier_id
     * @return mixed
     */
    public function getSupplierOrders($supplier_id);
}
