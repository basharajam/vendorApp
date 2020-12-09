<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class TermRelation extends Model
{
    protected $table=\General::DB_PREFIX."term_relationships";

    public $timestamps = false;

    protected $fillable=[
        'object_id',
        'term_taxonomy_id',
        'term_order'
    ];
    public function taxonomy(){
        return $this->belongsTo('App\Models\WP\TermTaxonomy','term_taxonomy_id');
    }
    public function post(){
        return $this->belongsTo('App\Models\WP\Post','object_id');
    }

}
