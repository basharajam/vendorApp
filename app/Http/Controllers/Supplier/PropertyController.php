<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\TermTaxonomy\ITermTaxonomyService;

use App\Models\Property;
use App\Models\WP\PostMeta;
use App\Models\WP\TermTaxonomy;


class PropertyController extends Controller
{
    //
    private $taxonomy_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ITermTaxonomyService  $axonomy_service)
    {
        $this->middleware('auth');
        $this->taxonomy_service=$axonomy_service;
    }

    public function index()
    {

        $user0=\Auth::user()->username;
        $Props=Property::where('PropUser',$user0)->orderBy('created_at','desc')->get();
    
        $Categories=$this->taxonomy_service->categories();

        return view('supplier.properties.index',['Props'=>$Props,'Categories'=>$Categories]);
        

    }

    public function AddProp(Request $request)
    {

        //validate Inputs 
        $validate = Validator::make(request()->all(), [
            'PropNameI'=>'required',
            'PropValueI'=>'required',
            'PropUserI'=>'required',
            'PropCatI'=>'required'
        ]);

        if ($validate->fails()) {
            
            return $validate->errors();
            return response()->json(['success'=>false,'message'=>'validate','props'=>null], 400);
        }

        //Check username
        $user0=\Auth::user()->username;
        $user1=$request->input('PropUserI');

        if($user0 !== $user1){
            return response()->json(['success'=>false,'message'=>'wrong','props'=>null], 400);
        }

        //Check Category
        $CheckCategory=TermTaxonomy::where('term_taxonomy_id',$request->input('PropCatI'))->first();

        if(empty($CheckCategory) ){

            return response()->json(['success'=>false,'message'=>'validate','props'=>null], 400);
        }

        try {

            //Save Property
            $SaveProp=new Property([
                'PropName'=>$request->input('PropNameI'),
                'PropValue'=>$request->input('PropValueI'),
                'PropUser'=>$user1,
                'PropCatId'=>$request->input('PropCatI')
            ]);
    
            $SaveProp->save();
    
            //get Props 
            $getPorps=Property::where('PropUser',$user1)->orderBy('created_at','desc')->get();
    
            return response()->json(['success'=>true,'message'=>'success','props'=>$getPorps], 201);
            //Done
            
        } catch (Expection $th) {
            
            return response()->json(['success'=>false,'message'=>'wrong','props'=>null], 400);
            //Done

        }


    }

    public function RemoveProp($propId,Request $request)
    {
        //validate inputs 
        if (empty($propId)) {
            
            \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
            \Session::flash('status',false);
            return redirect()->back();

        }

        //Check Prop
        $CheckProp=Property::find($propId);
        
        if(!empty($CheckProp)){

            //Check if no postMeta 
            $CheckPostMeta=PostMeta::where('meta_key',$CheckProp['PropName'])->where('meta_value',$CheckProp['PropValue'])->count();

            if( $CheckPostMeta > 0){
                \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                \Session::flash('status',false);
                return redirect()->back();

            }else{

                //Remove Prop
                $CheckProp->delete();

                \Session::flash('message',"تمت العملية بنجاح");
                \Session::flash('status',true);
                return redirect()->back();

            }

        }
        else{
            \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
            \Session::flash('status',false);
            return redirect()->back();
        }


    }

    public function UpdProp(Request $request)
    {

        //validate inputs 
        $validate = Validator::make(request()->all(), [
            'PropIdI'=>'required',
            'PropValueI'=>'required',
            'PropCategoryIdI'=>'required'
        ]);
        
        if ($validate->fails()) {
       
          return response()->json(['success'=>false,'message'=>'validate','props'=>null], 400);
        }

        //Check Prop
        $CheckProp=Property::find($request->input('PropIdI'));

        if(!empty($CheckProp)){

            try {
                
                //Update Prop
                $CheckProp->update([
                    'PropValue'=>$request->input('PropValueI'),
                    'PropCatId'=>$request->input('PropCategoryIdI')
                ]);
                \Session::flash('message',"تمت العملية بنجاح");
                \Session::flash('status',true);



            } catch (Expection $th ) {
                \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                \Session::flash('status',false);
                return "error";
            }

            return redirect()->back();

        }
        else{
            \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
            \Session::flash('status',false);
            
            return redirect()->back();
        }

    }


    public function UpdPropAj(Request $request)
    {
        //
        //validate inputs 
        $validate = Validator::make(request()->all(), [
            'PropIdI'=>'required',
            'PropValueI'=>'required',
            'PropCategoryIdI'=>'required'
        ]);
        
        if ($validate->fails()) {
        
            return response()->json(['success'=>false,'message'=>'validate','props'=>null], 400);
        }

        //Check Prop
        $CheckProp=Property::find($request->input('PropIdI'));

        if(!empty($CheckProp)){

            try {
                
                //Update Prop
                $CheckProp->update([
                    'PropValue'=>$request->input('PropValueI'),
                    'PropCatId'=>$request->input('PropCategoryIdI')
                
                ]);

                //get Properties 
                $user0=\Auth::user()->username;
                $getPorps=Property::whereIn('PropCatId',$request->CatArrI)->where('PropUser',$user0)->get();

                return response()->json(['success'=>true,'message'=>'success','props'=>$getPorps], 201);
                //Done

            } catch (Expection $th ) {

                return response()->json(['success'=>false,'message'=>'success','props'=>null], 400);

            }

          

        }
        else{
        
        }
    }

    public function StatusProp(Request $request)
    {

        
        //validate inputs 
        $validate = Validator::make(request()->all(), [
            'PropIdI'=>'required',
        ]);

        if ($validate->fails()) {
            
            return response()->json(['success'=>false,'message'=>'validate','props'=>null], 400);
        }

        //Update Prop Status
 
            //get Current Status
            $prop=Property::find($request->input('PropIdI'));

            if(!empty($prop)){

                $status=$prop['PropStatus'];

                if($status === 0 ){

                    $newStatus=1;
                }
                else{
                    $newStatus=0;
                };

                //Update
                $prop->update([
                    'PropStatus'=>$newStatus
                ]);

                return response()->json(['success'=>true,'message'=>'success','props'=>$newStatus], 200);

            }
            else{
                return response()->json(['success'=>false,'message'=>'Wrong','props'=>null], 400);
            }

    }


    public function Editprop(Request $request)
    {
        //validate inptuts
 
        
        //get Property 
        $getProp=Property::find($request->input('property_id'));

        if(empty($getProp)){
            return response()->json(['success'=>false,'message'=>'Wrong','props'=>null], 400);

        }

        //get Cateogories 
        $Categories=$this->taxonomy_service->categories();
        
        return view('supplier.properties.components.prop_modal')
        ->with('property',$getProp)
        ->with('categories',$Categories);

    }
    public function getPropsAj(Request $request)
    {
        //validate inputs 

        $user0=\Auth::user()->username;
        $getPorps=property::whereIn('PropCatId',$request->CatArrI)->where('PropUser',$user0)->get();

        return response()->json(['success'=>true,'message'=>'success','props'=>$getPorps], 200);
     
    }

}



