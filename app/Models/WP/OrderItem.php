<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table="	wpug_woocommerce_order_items";
    protected $primaryKey="order_item_id";

    protected $appends = [];
    public $timestamps = false;

    protected $fillable =  [
    "order_item_name" ,
    "order_item_type" ,
    "order_id" ,
    ];

}
