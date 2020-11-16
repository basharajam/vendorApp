<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;
use App\Models\WP\TermRelation;
class TermTaxonomy extends Model
{
    protected $table="wpug_term_taxonomy";
    protected $primaryKey="term_taxonomy_id";

    protected $fillable=[
        'term_id',
        'taxonomy',
        'description',
        'parent'
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
        return TermTaxonomy::where('taxonomy',$this->taxonomy)->get();
    }
    public function getImageAttribute()
    {
        return $this->posts()->join('wpug_posts','object_id','wpug_posts.ID')->where('wpug_posts.post_type','attachment')->first()->guid ?? null;
    }
}
