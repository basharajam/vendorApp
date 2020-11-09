<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    protected $table="wpug_usermeta";
    protected $primaryKey="umeta_id";
    protected $with = ['user'];

    protected $fillable =  [
    "user_id" ,
    "meta_key" ,
    "meta_value" ,
    ];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\WP\WpUser','wpug_users','user_id');
    }


}
