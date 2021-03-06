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

    /** get's all orders for a s manger
     * @param $manager_id
     * @return mixed
     */
    public function getSupplierManagerOrders($manager_id);
     /** get paid orders for a supplier
     * @param $supplier_id
     * @return mixed
     */
    public function getSupplierPaidOrders($supplier_id);
     /** get paid orders for a supplier manager
     * @param $manager_id
     * @return mixed
     */
    public function getSupplierManagerPaidOrders($manager_id);

     /** get not  paid  (canceld , and pending ) orders for a supplier
     * @param $supplier_id
     * @return mixed
     */
    public function getSupplieNotPaidrOrders($supplier_id);

    /** get not  paid  (canceld , and pending ) orders for a supplier manager
     * @param $manager_id
     * @return mixed
     */
    public function getSupplieManagerNotPaidrOrders($manager_id);

}
