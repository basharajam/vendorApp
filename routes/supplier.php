<?php

/*
|--------------------------------------------------------------------------
| Supplier Routes
|--------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Route;

Route::get('/home',[App\Http\Controllers\Supplier\OrderController::class, 'index'])->name('supplier.home');

//Support Request
Route::get('/support',[App\Http\Controllers\Supplier\SupportController::class, 'viewForm'])->name('supplier.support_view');
Route::post('/support/store',[App\Http\Controllers\Supplier\SupportController::class, 'store'])->name('supplier.send_request');


//Products
Route::get('/products',[App\Http\Controllers\Supplier\ProductController::class, 'index'])->name('supplier.products.index');
Route::get('/products/addedit/{id?}',[App\Http\Controllers\Supplier\ProductController::class, 'addedit'])->name('supplier.products.create');
Route::post('/products/store',[App\Http\Controllers\Supplier\ProductController::class, 'store'])->name('supplier.products.store');
Route::get('/products/delete/{id}',[App\Http\Controllers\Supplier\ProductController::class, 'delete'])->name('supplier.products.delete');
Route::get('product/getForm/{type}',[App\Http\Controllers\Supplier\ProductController::class, 'getForm']);
Route::post('/product/getAttributeSelector',[App\Http\Controllers\Supplier\ProductController::class, 'getAttributeSelector'])->name('supplier.products.getAttributeSelector');
Route::post('/product/getTaxonomyTerms',[App\Http\Controllers\Supplier\ProductController::class, 'getTaxonomyTerms'])->name('supplier.products.getTaxonomyTerms');
Route::post('/products/variations/store',[App\Http\Controllers\Supplier\ProductController::class, 'storeVariation'])->name('supplier.products.variation.store');
Route::post('/products/variations/store_meta',[App\Http\Controllers\Supplier\ProductController::class, 'storeVariationMeta'])->name('supplier.products.variation.storeMeta');


//(Categories)
Route::get('/categories',[App\Http\Controllers\Supplier\TaxonomyController::class,'categories'])->name('supplier.categories');
Route::get('/tags',[App\Http\Controllers\Supplier\TaxonomyController::class,'tags'])->name('supplier.tags');


//Taxonomies
Route::post('/taxonomies/store',[App\Http\Controllers\Supplier\TaxonomyController::class,'store'])->name('supplier.taxonomies.store');
Route::post('/taxonomies/update/{term_taxonomy_id}',[App\Http\Controllers\Supplier\TaxonomyController::class,'update'])->name('supplier.taxonomies.update');
Route::post('/taxonomies/edit',[App\Http\Controllers\Supplier\TaxonomyController::class,'getEditModal'])->name('supplier.taxonomies.edit');
Route::get('/taxonomies/delete/{term_taxonomy_id}',[App\Http\Controllers\Supplier\TaxonomyController::class,'delete'])->name('supplier.taxonomies.delete');


//Attributes

Route::get('/attributes',[App\Http\Controllers\Supplier\AttributeController::class,'index'])->name('supplier.attributes');
Route::post('/attributes/store',[App\Http\Controllers\Supplier\AttributeController::class,'store'])->name('supplier.attributes.store');
Route::post('/terms/store',[App\Http\Controllers\Supplier\AttributeController::class,'storeTerm'])->name('supplier.terms.store');
Route::post('/attributes/update/{term_taxonomy_id}',[App\Http\Controllers\Supplier\AttributeController::class,'update'])->name('supplier.attributes.update');
Route::post('/attributes/edit',[App\Http\Controllers\Supplier\AttributeController::class,'getEditModal'])->name('supplier.attributes.edit');
Route::post('/terms/add',[App\Http\Controllers\Supplier\AttributeController::class,'getAddTerm'])->name('supplier.attributes.addTerm');
Route::get('/attributes/delete/{term_taxonomy_id}',[App\Http\Controllers\Supplier\Attribut\eController::class,'delete'])->name('supplier.attributes.delete');


//Orders
Route::get('/orders',[App\Http\Controllers\Supplier\OrderController::class,'index'])->name('supplier.orders');
Route::get('/orders/paid',[App\Http\Controllers\Supplier\OrderController::class,'paidOrders'])->name('supplier.paid_orders');
Route::get('/orders/not-paid',[App\Http\Controllers\Supplier\OrderController::class,'notPaidOrders'])->name('supplier.not_paid_orders');
Route::get('/orders/view/{order_id}',[App\Http\Controllers\Supplier\OrderController::class,'viewOrder'])->name('supplier.orders.view');

//Profile
Route::get('/profile',[App\Http\Controllers\Supplier\ProfileController::class,'profile'])->name('supplier.profile');
