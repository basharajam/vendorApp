<?php

namespace App\Models;


class SupportRequest extends BaseModel
{

    protected $fillable=[
        'name',
        'email',
        'phone',
        'message',
        'requestable_id',
        'requestable_type'
    ];

    public function requestable(){
        return $this->morphTo();
    }

}
