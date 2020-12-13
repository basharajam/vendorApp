<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use App\Services\OrderItem\IOrderItemService;
use Illuminate\Http\Request;
use App\Services\Post\IPostService;
use App\Services\Supplier\ISupplierService;

class HomeController extends Controller
{

    private $post_service,$order_service,$supplier_service;
    public function __construct(IPostService $post_service,IOrderItemService $order_service,ISupplierService $supplier_service)
    {
        $this->post_service = $post_service;
        $this->order_service = $order_service;
        $this->supplier_service = $supplier_service;
    }
    public function index(){
        $products_count = 0;
        // $products_count = $this->post_service->get_products_for_supplier_manager(\Auth::user()->userable->id)->count();
        $suppliers_count =$this->supplier_service->getSuppliersForManager(\Auth::user()->userable->id)->count();
        $orders_count = $this->order_service->getSupplierManagerOrders(\Auth::user()->userable->id)->count();
        return view('supplier_manager.home.index')
                ->with('products_count',$products_count)
                ->with('suppliers_count',$suppliers_count)
                ->with('orders_count',$orders_count);
    }
}
