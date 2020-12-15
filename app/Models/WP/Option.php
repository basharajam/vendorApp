<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;
use App\Models\WP\TermRelation;
class Option extends Model
{
    protected $table=\General::DB_PREFIX."options";
    protected $primaryKey="option_id";

    protected $fillable=[
        'option_id',
        'option_name',
        'option_value',
        'autoload',
    ];
    public $timestamps = false;

}
