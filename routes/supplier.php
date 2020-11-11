<?php

/*
|--------------------------------------------------------------------------
| Supplier Routes
|--------------------------------------------------------------------------
*/

Route::get('/home','HomeController@index')->name('supplier.home');

//Support Request
Route::get('/support',[App\Http\Controllers\Supplier\SupportController::class, 'viewForm'])->name('supplier.support_view');
Route::post('/support/store',[App\Http\Controllers\Supplier\SupportController::class, 'store'])->name('supplier.send_request');


//Products
Route::get('/products',[App\Http\Controllers\Supplier\ProductController::class, 'index'])->name('supplier.products.index');
Route::get('/products/create',[App\Http\Controllers\Supplier\ProductController::class, 'create'])->name('supplier.products.create');
Route::post('/products/store',[App\Http\Controllers\Supplier\ProductController::class, 'store'])->name('supplier.products.store');
