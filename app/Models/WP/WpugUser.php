<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class WpugUser extends Model
{
    protected $table = \General::DB_PREFIX."users";
    //protected $primaryKey="ID";

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




}
