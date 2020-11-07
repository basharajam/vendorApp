<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table="wpug_terms";
    protected $primaryKey="term_id";

    public function taxonomy(){
        return $this->hasOne("App\Models\WP\Term");
    }


}
