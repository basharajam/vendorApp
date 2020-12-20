<?php


namespace App\Services\OrderItem;

use App\Models\Supplier;
use App\Models\WP\OrderDetail;
use App\Repositories\OrderItemRepository;
use App\Services\Contracts\BaseService;
use App\Models\WP\Post;
use App\Models\WP\OrderItem;
use App\Models\WP\OrderItemMeta;

//TODO Modify According to Supplier and SUpplier manager

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
        //the supplier_id is the post_author in posts table
        $products_ids =Post::where('post_author',$supplier_id)
                            ->whereIn('post_type',['product','product_variation'])
                            ->get()->pluck('ID')->toArray();
        // $orders_ids = OrderDetail::whereIn('product_id',$products_ids)->get()->pluck('order_id')->toArray();
        $orders_ids = OrderItemMeta::whereIn('meta_key',['_product_id','_variation_id'])->whereIn('meta_value',$products_ids)->get()->pluck('order_item_id')->toArray();
        return OrderItem::where('order_item_type','line_item')->whereIn('order_item_id',$orders_ids)->get();
        //TODO order data by orde date
    }
    /** get's all orders for a s manger
     * @param $manager_id
     * @return mixed
     */
    public function getSupplierManagerOrders($manager_id){
        $suppliers = Supplier::where('manager_id',$manager_id)->get();
        $suppliers_ids =[];
        foreach($suppliers as $supplier){
            array_push($suppliers_ids,$supplier->user->wordpress_user->ID);
        }
        $products_ids =Post::whereIn('post_author',$suppliers_ids)
        ->whereIn('post_type',['product','product_variation'])
        ->get()->pluck('ID')->toArray();
        // $orders_ids = OrderDetail::whereIn('product_id',$products_ids)->get()->pluck('order_id')->toArray();
        $orders_ids = OrderItemMeta::whereIn('meta_key',['_product_id','_variation_id'])->whereIn('meta_value',$products_ids)->get()->pluck('order_item_id')->toArray();
        // return OrderItem::where('order_item_type','line_item')->whereIn('order_id',$orders_ids)->get();
        return OrderItem::where('order_item_type','line_item')->whereIn('order_item_id',$orders_ids)->get();

    }
    /** get paid orders for a supplier
     * @param $supplier_id
     * @return mixed
     */
    public function getSupplierPaidOrders($supplier_id){
        $products_ids =Post::where('post_author',$supplier_id)
        ->whereIn('post_type',['product','product_variation'])
        ->get()->pluck('ID')->toArray();
        // $orders_ids = OrderDetail::whereIn('product_id',$products_ids)->get()->pluck('order_id')->toArray();
        $orders_ids = OrderItemMeta::whereIn('meta_key',['_product_id','_variation_id'])->whereIn('meta_value',$products_ids)->get()->pluck('order_item_id')->toArray();

        return OrderItem::where('order_item_type','line_item')->whereIn('order_item_id',$orders_ids)->whereHas('post',function($query){
            return $query->where('post_status','wc-completed');
        })->get();

    }
     /** get paid orders for a supplier manager
     * @param $manager_id
     * @return mixed
     */
    public function getSupplierManagerPaidOrders($manager_id){
        $suppliers = Supplier::where('manager_id',$manager_id)->get();
        $suppliers_ids =[];
        foreach($suppliers as $supplier){
            array_push($suppliers_ids,$supplier->user->wordpress_user->ID);
        }
        $products_ids =Post::where('post_author',$suppliers_ids)
        ->whereIn('post_type',['product','product_variation'])
        ->get()->pluck('ID')->toArray();
        // $orders_ids = OrderDetail::whereIn('product_id',$products_ids)->get()->pluck('order_id')->toArray();
        $orders_ids = OrderItemMeta::whereIn('meta_key',['_product_id','_variation_id'])->whereIn('meta_value',$products_ids)->get()->pluck('order_item_id')->toArray();

        return OrderItem::where('order_item_type','line_item')->whereIn('order_item_id',$orders_ids)->whereHas('post',function($query){
            return $query->where('post_status','wc-completed');
        })->get();
    }
    /** get not  paid  (canceld , and pending ) orders for a supplier
     * @param $supplier_id
     * @return mixed
     */
    public function getSupplieNotPaidrOrders($supplier_id){
        $products_ids =Post::where('post_author',$supplier_id)
        ->whereIn('post_type',['product','product_variation'])
        ->get()->pluck('ID')->toArray();
        // $orders_ids = OrderDetail::whereIn('product_id',$products_ids)->get()->pluck('order_id')->toArray();
        $orders_ids = OrderItemMeta::whereIn('meta_key',['_product_id','_variation_id'])->whereIn('meta_value',$products_ids)->get()->pluck('order_item_id')->toArray();
        return OrderItem::where('order_item_type','line_item')->whereIn('order_item_id',$orders_ids)->whereHas('post',function($query){
            return $query->where('post_status','!=','wc-completed');
        })->get();

    }
     /** get not  paid  (canceld , and pending ) orders for a supplier manager
     * @param $manager_id
     * @return mixed
     */
    public function getSupplieManagerNotPaidrOrders($manager_id){
        $suppliers = Supplier::where('manager_id',$manager_id)->get();
        $suppliers_ids =[];
        foreach($suppliers as $supplier){
            array_push($suppliers_ids,$supplier->user->wordpress_user->ID);
        }
        $products_ids =Post::where('post_author',$suppliers_ids)
        ->whereIn('post_type',['product','product_variation'])
        ->get()->pluck('ID')->toArray();
        // $orders_ids = OrderDetail::whereIn('product_id',$products_ids)->get()->pluck('order_id')->toArray();
        $orders_ids = OrderItemMeta::whereIn('meta_key',['_product_id','_variation_id'])->whereIn('meta_value',$products_ids)->get()->pluck('order_item_id')->toArray();

        return OrderItem::where('order_item_type','line_item')->whereIn('order_item_id',$orders_ids)->whereHas('post',function($query){
            return $query->where('post_status','!=','wc-completed');
        })->get();
    }
    public function view($id){
        return OrderItem::where('order_item_id',$id)->first();
    }
}
