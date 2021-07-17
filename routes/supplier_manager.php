<?php

/*
|--------------------------------------------------------------------------
| Supplier Manger Routes
|--------------------------------------------------------------------------
*/

//Check User Type Middleware
Route::middleware(['supplier_manager'])->group(function () {

    Route::get('/home',[App\Http\Controllers\SupplierManager\HomeController::class, 'index'])->name('supplier_manager.home');

    //suppliers
    Route::get('/suppliers',[App\Http\Controllers\SupplierManager\SupplierController::class, 'index'])->name('supplier_manager.suppliers.index')->middleware('verified');
    Route::get('/suppliers/create',[App\Http\Controllers\SupplierManager\SupplierController::class, 'create'])->name('supplier_manager.suppliers.create')->middleware('verified');
    Route::post('/suppliers/store',[App\Http\Controllers\SupplierManager\SupplierController::class, 'store'])->name('supplier_manager.suppliers.store')->middleware('verified');
    Route::get('/suppliers/edit/{id}',[App\Http\Controllers\SupplierManager\SupplierController::class, 'edit'])->name('supplier_manager.suppliers.edit')->middleware('verified');
    Route::post('/suppliers/update',[App\Http\Controllers\SupplierManager\SupplierController::class, 'update'])->name('supplier_manager.suppliers.update')->middleware('verified');
    Route::get('/suppliers/delete/{id}',[App\Http\Controllers\SupplierManager\SupplierController::class, 'delete'])->name('supplier_manager.suppliers.delete')->middleware('verified');
    
    //Orders
    Route::get('/orders',[App\Http\Controllers\SupplierManager\OrderController::class,'index'])->name('supplier_manager.orders')->middleware('verified');
    Route::get('/orders/paid',[App\Http\Controllers\SupplierManager\OrderController::class,'paidOrders'])->name('supplier_manager.paid_orders')->middleware('verified');
    Route::get('/orders/not-paid',[App\Http\Controllers\SupplierManager\OrderController::class,'notPaidOrders'])->name('supplier_manager.not_paid_orders')->middleware('verified');
    Route::get('/orders/view/{order_id}',[App\Http\Controllers\SupplierManager\OrderController::class,'viewOrder'])->name('supplier_manager.orders.view')->middleware('verified');
    
    //Support Request
    Route::get('/support',[App\Http\Controllers\SupplierManager\SupportController::class, 'viewForm'])->name('supplier_manager.support_view');
    Route::post('/support/store',[App\Http\Controllers\SupplierManager\SupportController::class, 'store'])->name('supplier_manager.send_request');
    
    //Profit Ratio
    
    Route::get('/profit-ratio',[App\Http\Controllers\SupplierManager\ProfitRatioController::class,'index'])->name('supplier_manager.profit.index')->middleware('verified');
    Route::post('/profit-ratio',[App\Http\Controllers\SupplierManager\ProfitRatioController::class,'update'])->name('supplier_manager.profit.store')->middleware('verified');
    
    
    //Products
    Route::get('/products',[App\Http\Controllers\SupplierManager\ProductController::class,'index'])->name('supplier_manager.suppliers.all_products')->middleware('verified');
    Route::get('/products/{supplier}',[App\Http\Controllers\SupplierManager\ProductController::class,'view'])->name('supplier_manager.suppliers.products')->middleware('verified');
    
    
    //Taxonomies
    Route::post('/taxonomies/store',[App\Http\Controllers\SupplierManager\TaxonomyController::class,'store'])->name('supplier_manager.taxonomies.store')->middleware('verified');
    Route::post('/taxonomies/update/{term_taxonomy_id}',[App\Http\Controllers\SupplierManager\TaxonomyController::class,'update'])->name('supplier_manager.taxonomies.update')->middleware('verified');
    Route::post('/taxonomies/edit',[App\Http\Controllers\SupplierManager\TaxonomyController::class,'getEditModal'])->name('supplier_manager.taxonomies.edit')->middleware('verified');
    Route::get('/taxonomies/delete/{term_taxonomy_id}',[App\Http\Controllers\SupplierManager\TaxonomyController::class,'delete'])->name('supplier_manager.taxonomies.delete')->middleware('verified');
    
    Route::get('/profile',[App\Http\Controllers\SupplierManager\ProfileController::class,'profile'])->name('supplier_manager.profile');
    Route::post('/profile/update',[App\Http\Controllers\SupplierManager\ProfileController::class,'update'])->name('supplier_manager.profile.update');

});    

