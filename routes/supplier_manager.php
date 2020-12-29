<?php

/*
|--------------------------------------------------------------------------
| Supplier Manger Routes
|--------------------------------------------------------------------------
*/

Route::get('/home',[App\Http\Controllers\SupplierManager\HomeController::class, 'index'])->name('supplier_manager.home');

//suppliers
Route::get('/suppliers',[App\Http\Controllers\SupplierManager\SupplierController::class, 'index'])->name('supplier_manager.suppliers.index');
Route::get('/suppliers/create',[App\Http\Controllers\SupplierManager\SupplierController::class, 'create'])->name('supplier_manager.suppliers.create');
Route::post('/suppliers/store',[App\Http\Controllers\SupplierManager\SupplierController::class, 'store'])->name('supplier_manager.suppliers.store');
Route::get('/suppliers/edit/{id}',[App\Http\Controllers\SupplierManager\SupplierController::class, 'edit'])->name('supplier_manager.suppliers.edit');
Route::post('/suppliers/update',[App\Http\Controllers\SupplierManager\SupplierController::class, 'update'])->name('supplier_manager.suppliers.update');
Route::get('/suppliers/delete/{id}',[App\Http\Controllers\SupplierManager\SupplierController::class, 'delete'])->name('supplier_manager.suppliers.delete');


//Orders
Route::get('/orders',[App\Http\Controllers\SupplierManager\OrderController::class,'index'])->name('supplier_manager.orders');
Route::get('/orders/paid',[App\Http\Controllers\SupplierManager\OrderController::class,'paidOrders'])->name('supplier_manager.paid_orders');
Route::get('/orders/not-paid',[App\Http\Controllers\SupplierManager\OrderController::class,'notPaidOrders'])->name('supplier_manager.not_paid_orders');
Route::get('/orders/view/{order_id}',[App\Http\Controllers\SupplierManager\OrderController::class,'viewOrder'])->name('supplier_manager.orders.view');

//Support Request
Route::get('/support',[App\Http\Controllers\SupplierManager\SupportController::class, 'viewForm'])->name('supplier_manager.support_view');
Route::post('/support/store',[App\Http\Controllers\SupplierManager\SupportController::class, 'store'])->name('supplier_manager.send_request');

//Profit Ratio

Route::get('/profit-ratio',[App\Http\Controllers\SupplierManager\ProfitRatioController::class,'index'])->name('supplier_manager.profit.index');
Route::post('/profit-ratio',[App\Http\Controllers\SupplierManager\ProfitRatioController::class,'update'])->name('supplier_manager.profit.store');


//Products
Route::get('/products',[App\Http\Controllers\SupplierManager\ProductController::class,'index'])->name('supplier_manager.suppliers.all_products');
Route::get('/products/{supplier}',[App\Http\Controllers\SupplierManager\ProductController::class,'view'])->name('supplier_manager.suppliers.products');
