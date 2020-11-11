<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class TermTaxonomy extends Model
{
    protected $table="wpug_term_taxonomy";
    protected $with=['term','posts'];
    public $timestamps = false;

    public function scopeCategories($query){
        return $query->whereIn('taxonomy',['category'])->distinct('product_cat');
    }

    public function term(){
        return $this->belongsTo('App\Models\WP\Term','term_id');
    }
    public function posts(){
        return $this->hasMany('App\Models\WP\TermRelation');
    }


}
