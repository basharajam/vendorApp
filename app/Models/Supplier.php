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
        "bank_account_number",
        "bank_account_owner_name",
        "company_name",
        "nationality",
        "shop_address",
        "national_number",
        "passport_number",
        "passport_end_date",
        "manager_id",
        'brithdate',
        'gender',
        'ischinese',
        'mobile_number',
        'company_created_at',
        'city_id',
        'company_shop_address',
        'company_office_address',
        'company_warehouse_address',
        'company_factory_address',
        'company_countries',
        'countries_which_company_doesnot_work_with'

    ];

    protected $appends = ["full_name",'national_id_image','passport_image','visa_image','commercial_license_image','company_logo_image','license_images'];

    public function getFullNameAttribute(){
        return $this->first_name.' ';
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
        $this->addMediaCollection('commercial_license_images')->singleFile();
        $this->addMediaCollection('company_logo_images')->singleFile();
        $this->addMediaCollection('license_images');

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
    public function getCommercialLicenseImageAttribute(){
        return $this->getFirstMedia('commercial_license_images');
    }
    public function getCompanyLogoImageAttribute(){
        return $this->getFirstMedia('company_logo_images');
    }
    public function getLicenseImagesAttribute(){
        return $this->getFirstMedia('license_images');
    }
}
