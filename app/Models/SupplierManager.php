<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class SupplierManager extends BaseModel implements HasMedia
{
    use HasMediaTrait;
    protected $fillable=[
        "first_name",
        "last_name",
        "email",
        'profit_ratio',
        'username'
    ];

    protected $appends = ["full_name"];

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function suppliers(){
        return $this->hasMany(Supplier::class,'manager_id');
    }

}
