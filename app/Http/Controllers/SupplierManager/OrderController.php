<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderItem\IOrderItemService;


class   OrderController extends Controller
{
    private $order_item_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IOrderItemService  $order_item_service)
    {
        $this->middleware('auth');
        $this->order_item_service = $order_item_service;
    }

    public function index(){
        $manager_id = \Auth::user()->userable->id;
        $orders = $this->order_item_service->getSupplierManagerOrders($manager_id);
        $paid_count = $this->order_item_service->getSupplierManagerPaidOrders($manager_id)->count();
        $not_paid_count =$this->order_item_service->getSupplieNotPaidrOrders($manager_id)->count();
        return view('supplier_manager.orders.index')
                ->with('not_paid_count',$not_paid_count)
                ->with('paid_count',$paid_count)
                ->with('orders',$orders);
    }
}
