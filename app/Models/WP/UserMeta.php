<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    protected $table="wpug_usermeta";
    protected $primaryKey="umeta_id";
    protected $append = ['user'];

    protected $fillable =  [
    "user_id" ,
    "meta_key" ,
    "meta_value" ,
    ];

    public $timestamps = false;

    public function getUserAttribute(){
        //dd(WpugUser::all());
        return WpugUser::where("ID","=",$this->user_id)->first();
        //return $this->belongsTo(WpugUser::class);
    }


}
