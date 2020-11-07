<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class TermRelation extends Model
{
    protected $table="wpug_term_relationships";


    public function taxonomy(){
        return $this->belongsTo('App\Models\WP\TermTaxonomy','term_taxonomy_id');
    }
    public function post(){
        return $this->belongsTo('App\Models\WP\Post','object_id');
    }

}
