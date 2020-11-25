<?php

namespace App\Models\WP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemMeta extends Model
{
    protected $table="wpug_woocommerce_order_itemmeta";
    protected $primaryKey="meta_id";
    public $timestamps = false;

    protected $fillable =  [
    "meta_id" ,
    "order_item_id" ,
    "meta_key" ,
    "meta_value" ,
    ];



}
