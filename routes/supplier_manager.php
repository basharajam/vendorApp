<?php

/*
|--------------------------------------------------------------------------
| Supplier Manger Routes
|--------------------------------------------------------------------------
*/

Route::get('/home',[App\Http\Controllers\SupplierManager\SupplierController::class, 'index'])->name('supplier_manager.home');

//suppliers
Route::get('/suppliers',[App\Http\Controllers\SupplierManager\SupplierController::class, 'index'])->name('supplier_manager.suppliers.index');
Route::get('/suppliers/create',[App\Http\Controllers\SupplierManager\SupplierController::class, 'create'])->name('supplier_manager.suppliers.create');
Route::post('/suppliers/store',[App\Http\Controllers\SupplierManager\SupplierController::class, 'store'])->name('supplier_manager.suppliers.store');
Route::get('/suppliers/edit/{id}',[App\Http\Controllers\SupplierManager\SupplierController::class, 'edit'])->name('supplier_manager.suppliers.edit');
Route::post('/suppliers/update',[App\Http\Controllers\SupplierManager\SupplierController::class, 'update'])->name('supplier_manager.suppliers.update');
Route::get('/suppliers/delete/{id}',[App\Http\Controllers\SupplierManager\SupplierController::class, 'delete'])->name('supplier_manager.suppliers.delete');

