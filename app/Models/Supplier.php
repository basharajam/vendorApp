<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Supplier extends BaseModel implements HasMedia
{
    use HasMediaTrait;

    protected $fillable=[
        "first_name",
        "last_name",
        "email",
        "bank_name",
        "bank_account_number",
        "bank_account_owner_name",
        "company_name",
        "nationality",
        "shop_address",
        "national_number",
        "passport_number",
        "passport_end_date",
        "manager_id"
    ];

    protected $appends = ["full_name"];

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function registerMediaCollections():void
    {
        $this->addMediaCollection('national_id_images')->singleFile();

        $this->addMediaCollection('passport_images')->singleFile();

        $this->addMediaCollection('visa_images')->singleFile();

    }
}
