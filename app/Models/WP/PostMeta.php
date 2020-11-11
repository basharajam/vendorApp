<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table="wpug_postmeta";
    protected $primaryKey="meta_id";

    protected $fillable =  [
        'post_id',
        'meta_key',
        'meta_value'
    ];
    public $timestamps = false;

    public function post(){
        return $this->belongsTo('App\Models\WP\Post','post_id');
    }



}
