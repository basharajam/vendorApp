<?php

/*
|--------------------------------------------------------------------------
| Supplier Manger Routes
|--------------------------------------------------------------------------
*/

Route::get('/home',[App\Http\Controllers\SupplierManager\SupplierController::class, 'index'])->name('supplier_manager.home');
Route::get('/home',[App\Http\Controllers\SupplierManager\SupplierController::class, 'index'])->name('supplier_manager.suppliers.create');

