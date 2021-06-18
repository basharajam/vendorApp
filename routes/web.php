<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use  Illuminate\Http\Request;
use App\Models\User;
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


//By Blaxk

Route::get('/ar',['uses'=>'App\Http\Controllers\controller@setLangAr','as'=>'setLangAr']);
Route::get('/en',['uses'=>'App\Http\Controllers\controller@setLangEn','as'=>'setLangEn']);
Route::get('/ch',['uses'=>'App\Http\Controllers\controller@setLangCh','as'=>'setLangCh']);
Route::post('/AddAttr',['uses'=>'App\Http\Controllers\Supplier\ProductController@AddAttr','as'=>'AddAttrPost']);

//By Blaxk

Route::post('/VariationCard',function(Request $request){
    return view('others.variation_card',['Variation'=>json_decode(json_encode($request->variation), true)]);
})->name('VariationCard');


Route::post('/PropsTable',function(Request $request){
    return view('others.props_table',['props'=>$request->props,'where'=>$request->where,'productID'=>$request->productID]);
})->name('PropsTable');

Route::post('RestPass',function(Request $request){

    //validate Inputs 
    $validate=$request->validate([
        'email'=>'required|email'
    ]);

    //Send Passowrd Rest Request 
    $status = Password::sendResetLink($validate);
    if($status === Password::RESET_LINK_SENT){
        return redirect()->back()->with(['status' =>$status,'done'=>true]);

    }
    else{

        return back()->with(['status'=>$status]);

    }

})->name('RestPassPost');

/////////////////

Route::get('/', function () {
    if(\Auth::user()){
        if(\Auth::user()->hasRole(\App\Constants\UserRoles::SUPPLIERMANAGER)){
            return redirect()->route('supplier_manager.home');
        }
        else if(\Auth::user()->hasRole(\App\Constants\UserRoles::SUPPLIER)){
            return redirect()->route('supplier.home');
        }
    }
    return redirect()->route('login');
});

Route::get('/reset-password',function(){
    return view('auth.reset-password');
})->name('reset-password-page');
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\SupplierManager\HomeController::class, 'index'])->name('home');

Route::get('/supplier/new-account',[App\Http\Controllers\Supplier\RegisterController::class, 'register'])->name('supplier_registeration_view');
Route::get('/supplier_manager/new-account',[App\Http\Controllers\SupplierManager\RegisterController::class, 'register'])->name('supplier_manager_registeration_view');
Route::post('/supplier/new',[App\Http\Controllers\Supplier\RegisterController::class, 'create'])->name('supplier_registeration');
Route::post('/supplier_manger/new',[App\Http\Controllers\SupplierManager\RegisterController::class, 'create'])->name('supplier_manager_registeration');

Route::post('/supplier/storeimages',[App\Http\Controllers\Supplier\ImageController::class, 'uploadImage'])->name('supplier.storeImage');
Route::post('/supplier/removeimages',[App\Http\Controllers\Supplier\ImageController::class, 'removeImage'])->name('supplier.removeImage');


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

Route::get('storage/{filename}', function ($filename)
{
    // Add folder path here instead of storing in the database.
    $path = storage_path('app/public' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/{folderName}/{fileName}', function ($folderName, $fileName)
{
    // Add folder path here instead of storing in the database.
    $path = storage_path('app/public/' . $folderName . '/' . $fileName);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::post('remove/{folderName}/{fileName}', function ($folderName, $fileName)
{
    // Add folder path here instead of storing in the database.
    $foldePath = storage_path('app/public/' . $folderName);
    $path = storage_path('app/public/' . $folderName . '/' . $fileName);
    
    File::deleteDirectory($foldePath);
    DB::delete('delete from media Where id = ?', [(int)$folderName]);
        

    //if (File::exists($path)) {
    //}

    return $folderName . '/' . $fileName;
});

Route::get('check/{email}', function ($email)
{
    //$results = DB::select('select count(*) as cnt from suppliers where email = ?', [$email])->first();
    $result = DB::table('users')->select('email')->where('email', $email)->first();
    if ($result)  {
        return 1;
    }
    else {
        return 0;
    }
    
    
})->name('CheckMail');

Route::get('checkUser/{username}',function($username){


    $CheckUser=User::where('username',$username)->count();
    if(  $CheckUser >0 ){
        return 1;
    }
    else{
        return 0;
    }

})->name('CheckUser');



///By Blaxk 
