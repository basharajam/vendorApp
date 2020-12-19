<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;

class ProductOrderLookup extends Model
{
    protected $table=\General::DB_PREFIX."wc_order_product_lookup";
    protected $primaryKey="order_item_id";

    protected $fillable =  [
        'order_id',
        'product_id',
        'variation_id',
        'date_created',
        'customer_id',
        'product_qty',
        'product_net_revenu',
        'product_gross_revenu',
    ];
    public $timestamps = false;

    public function post(){
        return $this->belongsTo('App\Models\WP\Post','product_id');
    }

    public function order(){
        return $this->belongsTo(OrderItem::class,'order_id');
    }



}
