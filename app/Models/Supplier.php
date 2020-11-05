<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Supplier extends BaseModel
{

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
    ];

    protected $appends = ["full_name"];

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}