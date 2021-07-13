<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;
use App\Models\WP\PostMeta;
use App\Models\WP\TermRelation;
use PhpParser\Node\Expr\FuncCall;

class Post extends Model
{
    protected $table=\General::DB_PREFIX."posts";
    protected $primaryKey="ID";
    //protected $appends = ['meta','categories','product_type','product_image'];
     protected $appends = ['meta','categories','product_type','product_image','tags'];
    //protected $appends = ['meta','categories','product_type','product_attributes','product_image','tags'];
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
    public function getTagsAttribute(){
        return    TermTaxonomy::whereIn('term_taxonomy_id',
                              TermRelation::where('object_id',$this->ID)
                                          ->pluck('term_taxonomy_id'))
                              ->whereIn('taxonomy',['product_tag'])
                              ->get();
      }
    public function getProductTypeAttribute(){
        return    TermTaxonomy::whereIn('term_taxonomy_id',
                                TermRelation::where('object_id',$this->ID)
                                            ->pluck('term_taxonomy_id'))
                                ->where('taxonomy','product_type')
                                ->first();
    }

    ///
    public function getProductAttributesAttribute(){

        return  TermTaxonomy::whereIn('term_taxonomy_id',
                  TermRelation::where('object_id',$this->ID)
                              ->pluck('term_taxonomy_id'))
              ->where('taxonomy','like','pa_%')
              ->get()->groupBy('taxonomy');

}


    ///
    public function getMetaAttribute(){
        return PostMeta::where('post_id',$this->ID)->pluck('meta_value','meta_key')->toArray();
    }
    public function getProductVariationsAttribute(){
        return Post::where('post_parent',$this->ID)->where('post_type','product_variation')->get();
    }
    public function getProductImageAttribute(){
        $image_post_meta =  PostMeta::where('post_id',$this->ID)->where('meta_key','_thumbnail_id')->first();
        if($image_post_meta){
            $image_post =  Post::where('ID',$image_post_meta->meta_value)->orderBy('ID','desc')->first();
            if($image_post){
                return $image_post;
            }
        }
        return '';
    }
    public function getGalleryAttribute(){
       return  Post::where('post_parent',$this->ID)
                                    ->where('post_type','attachment')
                                    ->get();

    }


}
