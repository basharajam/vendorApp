<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\WP\UserMeta;
use App\Models\WP\WpugUser;

class User extends Authenticatable implements MustVerifyEmail 
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'mobile',
        'mobile_verified_at',
        'userable_id',
        'userable_type',
    ];
    protected $append = ['wordpress_user'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userable()
    {
        return $this->morphTo();
    }

    public function getWordpressUserAttribute(){

        $meta =  UserMeta::where('meta_key','user_id')
                        ->where('meta_value',$this->id)->first();
        if($meta){
            return $meta->user;
           }
        return null;
        }
}
