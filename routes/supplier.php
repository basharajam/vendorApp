<?php





/*
|--------------------------------------------------------------------------
| Supplier Routes
|--------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Route;
use  Illuminate\Http\Request;

use App\Models\Property;


//Check User Type Middleware
Route::middleware(['supplier'])->group(function () {

    Route::get('/home',[App\Http\Controllers\Supplier\HomeController::class, 'index'])->name('supplier.home');
    
    //Support Request
    Route::get('/support',[App\Http\Controllers\Supplier\SupportController::class, 'viewForm'])->name('supplier.support_view');
    Route::post('/support/store',[App\Http\Controllers\Supplier\SupportController::class, 'store'])->name('supplier.send_request');

    //Products
    Route::get('/products',[App\Http\Controllers\Supplier\ProductController::class, 'index'])->name('supplier.products.index')->middleware('verified');
    Route::get('/products/addedit/{id?}',[App\Http\Controllers\Supplier\ProductController::class, 'addedit'])->name('supplier.products.create')->middleware('verified');
    Route::post('/products/store',[App\Http\Controllers\Supplier\ProductController::class, 'store'])->name('supplier.products.store')->middleware('verified');
    Route::get('/products/delete/{id}',[App\Http\Controllers\Supplier\ProductController::class, 'delete'])->name('supplier.products.delete')->middleware('verified');
    Route::get('product/getForm/{type}',[App\Http\Controllers\Supplier\ProductController::class, 'getForm'])->middleware('verified');
    Route::post('/product/getAttributeSelector',[App\Http\Controllers\Supplier\ProductController::class, 'getAttributeSelector'])->name('supplier.products.getAttributeSelector')->middleware('verified');
    Route::post('/product/getTaxonomyTerms',[App\Http\Controllers\Supplier\ProductController::class, 'getTaxonomyTerms'])->name('supplier.products.getTaxonomyTerms')->middleware('verified');
    Route::post('/products/variations/store',[App\Http\Controllers\Supplier\ProductController::class, 'storeVariation'])->name('supplier.products.variation.store')->middleware('verified');
    Route::post('/products/variations/store_meta',[App\Http\Controllers\Supplier\ProductController::class, 'storeVariationMeta'])->name('supplier.products.variation.storeMeta')->middleware('verified');
    
    //Gallery
    Route::post('/products/gallery/add',[App\Http\Controllers\Supplier\ProductController::class,'store'])->name('gallery.add')->middleware('verified');
    Route::get('/products/gallery/delete/{id}',[App\Http\Controllers\Supplier\ProductController::class,'delete'])->name('gallery.delete')->middleware('verified');
    
    //(Categories)
    Route::get('/categories',[App\Http\Controllers\Supplier\TaxonomyController::class,'categories'])->name('supplier.categories')->middleware('verified');
    Route::get('/tags',[App\Http\Controllers\Supplier\TaxonomyController::class,'tags'])->name('supplier.tags')->middleware('verified');
    
    
    //Taxonomies
    Route::post('/taxonomies/store',[App\Http\Controllers\Supplier\TaxonomyController::class,'store'])->name('supplier.taxonomies.store')->middleware('verified');
    Route::post('/taxonomies/update/{term_taxonomy_id}',[App\Http\Controllers\Supplier\TaxonomyController::class,'update'])->name('supplier.taxonomies.update')->middleware('verified');
    Route::post('/taxonomies/edit',[App\Http\Controllers\Supplier\TaxonomyController::class,'getEditModal'])->name('supplier.taxonomies.edit')->middleware('verified');
    Route::get('/taxonomies/delete/{term_taxonomy_id}',[App\Http\Controllers\Supplier\TaxonomyController::class,'delete'])->name('supplier.taxonomies.delete')->middleware('verified');
    
    
    //Attributes
    
    Route::get('/attributes',[App\Http\Controllers\Supplier\AttributeController::class,'index'])->name('supplier.attributes')->middleware('verified');
    Route::post('/attributes/store',[App\Http\Controllers\Supplier\AttributeController::class,'store'])->name('supplier.attributes.store')->middleware('verified');
    Route::post('/terms/store',[App\Http\Controllers\Supplier\AttributeController::class,'storeTerm'])->name('supplier.terms.store')->middleware('verified');
    Route::post('/attributes/update/{term_taxonomy_id}',[App\Http\Controllers\Supplier\AttributeController::class,'update'])->name('supplier.attributes.update')->middleware('verified');
    Route::post('/attributes/edit',[App\Http\Controllers\Supplier\AttributeController::class,'getEditModal'])->name('supplier.attributes.edit')->middleware('verified');
    Route::post('/terms/add',[App\Http\Controllers\Supplier\AttributeController::class,'getAddTerm'])->name('supplier.attributes.addTerm')->middleware('verified');
    Route::get('/attributes/delete/{term_taxonomy_id}',[App\Http\Controllers\Supplier\AttributeController::class,'delete'])->name('supplier.attributes.delete')->middleware('verified');
    
    
    //By Blaxk
    
    //properties 
    Route::get('/properties',['uses'=>'PropertyController@index'])->name('supplier.properties')->middleware('verified');
    Route::post('/properties/store',['uses'=>'PropertyController@AddProp','as'=>'SaveProp']);
    Route::post('/properties/edit',['uses'=>'PropertyController@Editprop','as'=>'EditProp']);
    Route::post('/properies/UpdateProp',['uses'=>'PropertyController@UpdProp','as'=>'UpdProp']);
    Route::post('/properties/UpdatePropAj',['uses'=>'PropertyController@UpdPropAj','as'=>'UpdPropAj']);
    Route::post('/propertiesStatusProp',['uses'=>'PropertyController@StatusProp','as'=>'StatusProp']);
    Route::get('/properties/RemoveProp/{prop_id}',['uses'=>'PropertyController@RemoveProp','as'=>'DelProp']);
    Route::post('DelPostMeta',['uses'=>'PropertyController@DelPostMeta','as'=>'DelPostMeta']);
    Route::post('/getProps',['uses'=>'PropertyController@getPropsAj','as'=>'getProps']);
    Route::post('/PropsTableForm',function(Request $request){
        return view('others.props_form_table',['props'=>$request->props,'where'=>$request->where,'productID'=>$request->productID]);
    })->name('PropsTableForm');
    //
    
    
    //Orders
    Route::get('/orders',[App\Http\Controllers\Supplier\OrderController::class,'index'])->name('supplier.orders')->middleware('verified');
    Route::get('/orders/paid',[App\Http\Controllers\Supplier\OrderController::class,'paidOrders'])->name('supplier.paid_orders')->middleware('verified');
    Route::get('/orders/not-paid',[App\Http\Controllers\Supplier\OrderController::class,'notPaidOrders'])->name('supplier.not_paid_orders')->middleware('verified');
    Route::get('/orders/view/{order_id}',[App\Http\Controllers\Supplier\OrderController::class,'viewOrder'])->name('supplier.orders.view')->middleware('verified');
    
    //Profile
    Route::get('/profile',[App\Http\Controllers\Supplier\ProfileController::class,'profile'])->name('supplier.profile');
    Route::post('/profile/update',[App\Http\Controllers\Supplier\ProfileController::class,'update'])->name('supplier.profile.update');
    
    
    //Imports
    Route::post('/products/import',[App\Http\Controllers\ImportExcel\ProductImportController::class,'import'])->name('supplier.products.import')->middleware('verified');

});      
