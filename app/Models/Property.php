<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WP\TermTaxonomy;
use App\Models\WP\Term;
use App\Models\WP\PostMeta;
class Property extends Model
{
    protected $appends=['meta','category'];
    
    protected $fillable=['PropName','PropValue','PropUser','PropStatus','PropCatId'];

    protected $hidden=['PropUser'];



    public function getMetaAttribute(){
        $user0=\Auth::user()->username;

        $props=property::where('PropUser',$user0)->pluck('PropName');

        return PostMeta::whereIn('meta_key',$props)->get();
    }
    

     
    public function getCategoryAttribute(){

        $taxonomy =  TermTaxonomy::where('term_taxonomy_id',$this->PropCatId)->first();
        return Term::where('term_id',$taxonomy['term_id'])->first();

    }


}
