<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends BaseModel
{
    protected $fillable=['name'];

    public function cities(){
        return $this->hasMany(City::class);
    }

}
