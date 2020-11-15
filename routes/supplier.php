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
Route::get('/products/edit/{id}',[App\Http\Controllers\Supplier\ProductController::class, 'edit'])->name('supplier.products.edit');
Route::post('/products/store',[App\Http\Controllers\Supplier\ProductController::class, 'store'])->name('supplier.products.store');
Route::post('/products/update/{post_id}',[App\Http\Controllers\Supplier\ProductController::class, 'update'])->name('supplier.products.update');
Route::get('/products/delete/{id}',[App\Http\Controllers\Supplier\ProductController::class, 'delete'])->name('supplier.products.delete');

Route::get('product/getForm/{type}',[App\Http\Controllers\Supplier\ProductController::class, 'getForm']);
Route::get('/taxonomies/{type}',[App\Http\Controllers\Supplier\TaxonomyController::class,'index'])->name('supplier.taxononmies');
