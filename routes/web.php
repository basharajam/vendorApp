<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('supplier.home');
});

Route::get('/reset-password',function(){
    return view('auth.reset-password');
})->name('reset-password-page');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/supplier/new-account',[App\Http\Controllers\Supplier\RegisterController::class, 'register'])->name('supplier_registeration_view');
Route::post('/supplier/new',[App\Http\Controllers\Supplier\RegisterController::class, 'create'])->name('supplier_registeration');
Route::post('/supplier/storeimages',[App\Http\Controllers\Supplier\ImageController::class, 'uploadImage'])->name('supplier.storeImage');


Route::get('/test',[App\Http\Controllers\WP\CategoryController::class,'getCategories']);



