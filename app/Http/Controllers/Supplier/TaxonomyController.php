<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WP\TermTaxonomy;
class TaxonomyController extends Controller
{

    public function index($type){
        return view('supplier.taxonomies.index')
                ->with('type',$type);
    }
}
