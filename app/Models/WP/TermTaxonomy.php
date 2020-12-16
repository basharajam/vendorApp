<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;
use App\Models\WP\TermRelation;
use App\Models\WP\TermMeta;
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
        $image_post_meta =  TermMeta::where('term_id',$this->term_id)->where('meta_key','_thumbnail_id')->first();
        if($image_post_meta){
            $image_post =  Post::where('ID',$image_post_meta->meta_value)->orderBy('ID','desc')->first();
            if($image_post){
                return $image_post;
            }
        }
        return '';
    }
}
