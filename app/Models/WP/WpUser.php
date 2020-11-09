<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class WpUser extends Model
{
    protected $table="wpug_users";
    protected $primaryKey="ID";
    protected $with = ['meta'];

    protected $fillable =  [
    "user_login" ,
    "user_pass" ,
    "user_nicename" ,
    "user_email" ,
    "user_url" ,
    "user_registered" ,
    "user_activation_key" ,
    "user_status" ,
    "display_name" ,
    ];
    public $timestamps = false;

    public function meta(){
        return $this->hasMany('App\Models\WP\UserMeta');
    }


}
