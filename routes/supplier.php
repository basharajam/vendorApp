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

//(Categories)
Route::get('/categories',[App\Http\Controllers\Supplier\TaxonomyController::class,'categories'])->name('supplier.categories');
Route::get('/tags',[App\Http\Controllers\Supplier\TaxonomyController::class,'tags'])->name('supplier.tags');


//Taxonomies
Route::post('/taxonomies/store',[App\Http\Controllers\Supplier\TaxonomyController::class,'store'])->name('supplier.taxonomies.store');
Route::post('/taxonomies/update/{term_taxonomy_id}',[App\Http\Controllers\Supplier\TaxonomyController::class,'update'])->name('supplier.taxonomies.update');
Route::post('/taxonomies/edit',[App\Http\Controllers\Supplier\TaxonomyController::class,'getEditModal'])->name('supplier.taxonomies.edit');
Route::get('/taxonomies/delete/{term_taxonomy_id}',[App\Http\Controllers\Supplier\TaxonomyController::class,'delete'])->name('supplier.taxonomies.delete');
