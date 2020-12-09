<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;
use App\Models\WP\TermRelation;
class TermTaxonomy extends Model
{
    protected $table=\General::DB_PREFIX."term_taxonomy";
    protected $primaryKey="term_taxonomy_id";

    protected $fillable=[
        'term_id',
        'taxonomy',
        'description',
        'parent',
        'supplier_id'
    ];
    protected $with=['term','posts'];
    public $timestamps = false;

    protected $appends = ['image','terms'];

    public function scopeCategories($query){
        return $query->whereIn('taxonomy',['category'])->distinct('product_cat');
    }

    public function term(){
        return $this->belongsTo('App\Models\WP\Term','term_id');
    }
    public function posts(){
        return $this->hasMany('App\Models\WP\TermRelation','term_taxonomy_id');
    }
    public function getTermsAttribute(){
        if(\Auth::user() && \Auth::user()->hasRole(\UserRoles::SUPPLIERMANAGER)){
            return TermTaxonomy::where('taxonomy',$this->taxonomy)->get();
        }
        else{
            return TermTaxonomy::where('taxonomy',$this->taxonomy)->where('supplier_id',\Auth::user()->userable->id)->get();
        }
    }
    public function getImageAttribute()
    {
        return $this->posts()->join(\General::DB_PREFIX.'posts','object_id',\General::DB_PREFIX.'posts.ID')->where(\General::DB_PREFIX.'posts.post_type','attachment')->first()->guid ?? null;
    }
}
