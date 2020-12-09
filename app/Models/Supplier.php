<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use function PHPSTORM_META\map;

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
        "manager_id",
        'age',
        'gender',
        'mobile_number',
        'company_years',

    ];

    protected $appends = ["full_name",'national_id_image','passport_image','visa_image'];

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

    public function getNationalIdImageAttribute(){
        return $this->getFirstMedia('national_id_images');
    }
    public function getPassportImageAttribute(){
        return $this->getFirstMedia('passport_images');
    }
    public function getVisaImageAttribute(){
        return $this->getFirstMedia('visa_images');
    }
}
