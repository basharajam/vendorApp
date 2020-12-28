<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use App\Models\WP\WpugUser;
class OrderItem extends Model
{
    protected $table=\General::DB_PREFIX."woocommerce_order_items";
    protected $primaryKey="order_item_id";
    protected $with = ['post','order_meta'];
    public $timestamps = false;

    protected $fillable =  [
    "order_item_name" ,
    "order_item_type" ,
    "order_id" ,
    ];

    public function post(){
        return $this->belongsTo(Post::class,'order_id');
    }
    public function order_meta(){
        return $this->hasMany(OrderItemMeta::class,'order_item_id','order_item_id');
    }
    public function getOrderDetailsAttribute(){
        // return $this->hasMany(OrderDetail::class,'order_id','order_id');
        $products_Ids = OrderItemMeta::where('order_item_id',$this->order_item_id)->where('meta_key','_product_id')->get()->pluck('meta_value');
        return OrderDetail::whereIn("product_id",$products_Ids)->get();
    }
    public function getCustomerAttribute(){
        if($this->post){
          return WpugUser::where('ID',$this->post->meta['_customer_user'])->first();
        }
        return null;
    }

}
