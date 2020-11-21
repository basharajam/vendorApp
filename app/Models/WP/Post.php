<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;
use App\Models\WP\PostMeta;
use App\Models\WP\TermRelation;
class Post extends Model
{
    protected $table="wpug_posts";
    protected $primaryKey="ID";

    protected $appends = ['meta','categories','product_type','product_attributes'];
    public $timestamps = false;

    protected $fillable =  [
    "post_author" ,
    "post_date" ,
    "post_date_gmt" , //it's like created_at
    "post_content" ,
    "post_title" ,
    "post_excerpt" , //post summary
    "post_status" ,
    "comment_status" ,
    "ping_status" ,
    "post_password" ,
    "post_name" ,
    "to_ping" ,
    "pinged" ,
    "post_modified" ,
    "post_modified_gmt" ,
    "post_content_filtered" ,
    "post_parent" ,
    "guid" , //ex. "https://alyamanlive.com/?post_type=product&p=6763"
    "menu_order" ,
    "post_type" ,
    "post_mime_type" ,
    "comment_count" ,
    ];

    public function scopeProducts($query){
        return $query->where('post_type','product');
    }
    public function getCategoriesAttribute(){
      return    TermTaxonomy::whereIn('term_taxonomy_id',
                            TermRelation::where('object_id',$this->ID)
                                        ->pluck('term_taxonomy_id'))
                            ->whereIn('taxonomy',['product_cat'])
                            ->get();
    }
    public function getProductTypeAttribute(){
        return    TermTaxonomy::whereIn('term_taxonomy_id',
                                TermRelation::where('object_id',$this->ID)
                                            ->pluck('term_taxonomy_id'))
                                ->whereIn('taxonomy',['product_type'])
                                ->first();
    }
    public function getProductAttributesAttribute(){
        return    TermTaxonomy::whereIn('term_taxonomy_id',
                                TermRelation::where('object_id',$this->ID)
                                            ->pluck('term_taxonomy_id'))
                                ->where('taxonomy','like','pa_%')
                                // ->groupBy('taxonomy')
                                ->get();

    }
    public function getMetaAttribute(){
        return PostMeta::where('post_id',$this->ID)->pluck('meta_value','meta_key')->toArray();
    }


}
