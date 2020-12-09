<?php

namespace App\Models\WP;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use App\Models\WP\WpugUser;
class OrderDetail extends Model
{
    protected $table=\General::DB_PREFIX."wc_order_product_lookup";
    protected $primaryKey="order_item_id";
    protected $with = ['order','post'];
    public $timestamps = false;



    public function post(){
        return $this->belongsTo(Post::class,'product_id');
    }
    public function order(){
        return $this->belongsTo(Post::class,'order_id');
    }

    public function getCustomerAttribute(){
        if($this->post){
          return WpugUser::where('ID',$this->post->meta['_customer_user'])->first();
        }
        return null;
    }

}
