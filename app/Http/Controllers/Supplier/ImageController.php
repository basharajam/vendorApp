<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request){
         $path = storage_path('app/public/tmp/uploads');
        //$path = public_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        
        $file = $request->file('file');
        
        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
