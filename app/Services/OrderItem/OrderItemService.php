<?php


namespace App\Services\OrderItem;


use App\Repositories\OrderItemRepository;
use App\Services\Contracts\BaseService;

use App\Models\WP\OrderItem;

/**
 * Class OrderItemService
 * @package App\Services\OrderItem
 */
class OrderItemService extends BaseService implements IOrderItemService
{
    /**
     * OrderItemService constructor.
     * @param OrderItemRepository $repository
     */
    public function __construct(OrderItemRepository $repository)
    {
        parent::__construct($repository);
    }

    /** get's all orders for a supplier
     * @param $supplier_id
     * @return mixed
     */
    public function getSupplierOrders($supplier_id){
        return OrderItem::where('order_item_type','line_item')->get();
    }
    /** get paid orders for a supplier
     * @param $supplier_id
     * @return mixed
     */
    public function getSupplierPaidOrders($supplier_id){
        return OrderItem::where('order_item_type','line_item')->whereHas('post',function($query){
            return $query->where('post_status','wc-completed');
        })->get();
    }
    /** get not  paid  (canceld , and pending ) orders for a supplier
     * @param $supplier_id
     * @return mixed
     */
    public function getSupplieNotPaidrOrders($supplier_id){
        return OrderItem::where('order_item_type','line_item')->whereHas('post',function($query){
            return $query->where('post_status','!=','wc-completed');
        })->get();
    }

}
