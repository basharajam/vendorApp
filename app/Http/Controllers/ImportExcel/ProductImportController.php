<?php

namespace App\Http\Controllers\ImportExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Helper\ExcelHelper;
use App\Imports\ProductImport;

class ProductImportController extends Controller
{
    //
    public function import(Request  $request){
       $result = \Excel::import(new ProductImport, request()->file('file'));
    }
}
