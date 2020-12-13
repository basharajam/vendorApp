<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Services\OrderItem\IOrderItemService;
use Illuminate\Http\Request;
use App\Services\Post\IPostService;
class HomeController extends Controller
{
    private $post_service,$order_service;
    public function __construct(IPostService $post_service,IOrderItemService $order_service)
    {
        $this->post_service = $post_service;
        $this->order_service = $order_service;
    }
    public function index(){
        $products_count = $this->post_service->get_products_for_supplier(\Auth::user()->wordpress_user->ID)->count();
        $orders_count = $this->order_service->getSupplierOrders(\Auth::user()->wordpress_user->ID)->count();
        return view('supplier.home.index')
                ->with('products_count',$products_count)
                ->with('orders_count',$orders_count);
    }
}
