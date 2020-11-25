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

        return view('supplier.orders.index')
                ->with('orders',$orders);
    }
}
