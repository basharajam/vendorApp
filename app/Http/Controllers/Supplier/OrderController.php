<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Services\OrderItem\IOrderItemService;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        $supplier_id = \Auth::user()->userable->id;
        $orders = $this->order_item_service->getSupplierOrders($supplier_id);
        $paid_count = $this->order_item_service->getSupplierPaidOrders($supplier_id)->count();
        $not_paid_count =$this->order_item_service->getSupplieNotPaidrOrders($supplier_id)->count();
        return view('supplier.orders.index')
                ->with('not_paid_count',$not_paid_count)
                ->with('paid_count',$paid_count)
                ->with('orders',$orders);
    }

    public function paidOrders(){
        $supplier_id = \Auth::user()->userable->id;
        $orders = $this->order_item_service->getSupplierPaidOrders($supplier_id);
        return view('supplier.orders.paid')
                ->with('orders',$orders);
    }

    public function notPaidOrders(){
        $supplier_id = \Auth::user()->userable->id;
        $orders = $this->order_item_service->getSupplieNotPaidrOrders($supplier_id);
        return view('supplier.orders.not_paid')
                ->with('orders',$orders);
    }
}
