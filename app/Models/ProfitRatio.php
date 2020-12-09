<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitRatio extends BaseModel
{
    protected $fillable = ['term_taxonomy_id','mangaer_id','ratio']
}
