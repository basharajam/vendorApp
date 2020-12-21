<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Http\Request;
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
    if(\Auth::user()){
        if(\Auth::user()->hasRole(\App\Constants\UserRoles::SUPPLIERMANAGER)){
            return redirect()->route('supplier_manager.home');
        }
        else if(\Auth::user()->hasRole(\App\Constants\UserRoles::SUPPLIER)){
            return redirect()->route('supplier.home');
        }
    }
    return redirect()->to('/home');
});

Route::get('/reset-password',function(){
    return view('auth.reset-password');
})->name('reset-password-page');
Auth::routes();

Route::get('/home', [App\Http\Controllers\SupplierManager\HomeController::class, 'index'])->name('home');

Route::get('/supplier/new-account',[App\Http\Controllers\Supplier\RegisterController::class, 'register'])->name('supplier_registeration_view');
Route::get('/supplier_manager/new-account',[App\Http\Controllers\SupplierManager\RegisterController::class, 'register'])->name('supplier_manager_registeration_view');
Route::post('/supplier/new',[App\Http\Controllers\Supplier\RegisterController::class, 'create'])->name('supplier_registeration');
Route::post('/supplier_manger/new',[App\Http\Controllers\SupplierManager\RegisterController::class, 'create'])->name('supplier_manager_registeration');

Route::post('/supplier/storeimages',[App\Http\Controllers\Supplier\ImageController::class, 'uploadImage'])->name('supplier.storeImage');


Route::get('/test',[App\Http\Controllers\WP\CategoryController::class,'getCategories']);



Route::get('/otpsent',[App\Http\Controllers\OTPController::class,'index']);
Route::post('/sendOtp',[App\Http\Controllers\OTPController::class,'sendOtp'])->name('auth.sendOTP');
Route::post('/verifyOtp',[App\Http\Controllers\OTPController::class,'verifyOtp'])->name('auth.verifyOTP');

//TODO Remove this
Route::get('/import-citeis',function(){
    \Excel::import(new App\Imports\CityImport, public_path('cities.xlsx'));
    dd('done');
});



Route::macro(
    'sendToRoute',
    function (Request $request, string $routeName) {
        $route = tap($this->routes->getByName($routeName))->bind($request);

        $this->current = $route;

        return $this->runRoute($request, $this->current);
    }
);

