<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App;
use App\Services\Post\IPostService;
use App\Models\WP\Post;
use App\Models\WP\TermTaxonomy;
use App\Models\WP\TermRelation;
use App\Models\WP\PostMeta;
use Illuminate\Support\Facades\Validator;
class Controller extends BaseController
{


    private $post_service;
    public function __construct(IPostService  $post_service)
    {
        $this->post_service=$post_service;
    }


    public function setLangAr()
    {

        //Set Ar Language
        App::setLocale('ar');
        session()->put('locale','ar');

        return redirect()->route('login');



    }

    public function setLangEn()
    {
        //Set En Language 
        App::setLocale('en');
        session()->put('locale','en');

        return redirect()->route('login');

    }

    public function setLangCh()
    {
        //Set En Language 
        App::setLocale('ch');
        session()->put('locale','ch');

        return redirect()->route('login');


    }





    public function AddAttrPost(Request $request)
    {

       
        //validate inputs 
        $validate = Validator::make(request()->all(), [
            'post_author'=>'required|integer',
            'post_id'=>'required|integer',
            'attributes_values'=>'required',
            'product_type'=>'required',
            'supplier_name'=>'required',
            'post_title'=>'required',
            'post_content'=>'required',
            'attributes'=>'required'

        ]);

        if ($validate->fails()) {
            
            return 'baddddddd';
        }
       // $this->post_service->store_product_variation($request);


        //get new Attributes 

         //get Product 
         //$prod=Post::where('ID',$request->input('post_id'))->first();
         $taxonomy =TermTaxonomy::where('term_taxonomy_id',1042)->first();
         
         if(!empty($taxonomy)){

            return response()->json(['success'=>true,'attr'=>$taxonomy], 200);

         }
         else{
             return 'empty';
         }

        return 'ddone';
    


    }


}
