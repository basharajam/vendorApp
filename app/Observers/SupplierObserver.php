<?php

namespace App\Observers;

use App\Models\Supplier;
use App\Models\User;
use App\Models\WP\WpUser;
use App\Models\WP\UserMeta;
class SupplierObserver
{
    /**
     * Handle the Supplier "created" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function created(Supplier $supplier)
    {
       $user =  User::create([
            'name'=>$supplier->first_name,
            'email'=>$supplier->email,
            'password'=>bcrypt(request()->password),
            'userable_type'=>'App\\Models\\Supplier',
            'userable_id'=>$supplier->id
        ]);
        $wp_user = WpUser::create([
            "user_login" =>$supplier->first_name,
            "user_pass"=>bcrypt(request()->password) ,
            "user_nicename" =>$supplier->first_name,
            "user_email"=>$supplier->email ,
            "user_url" =>'',
            "user_registered" =>$user->created_at,
            "display_name" =>$supplier->first_name . ' '. $supplier->last_name,
        ]);
        $wp_user_meta =UserMeta::create([
            "user_id" =>$wp_user->ID,
            "meta_key" =>'user_id',
            "meta_value" =>$user->id,
        ]);
    }

    /**
     * Handle the Supplier "updated" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function updated(Supplier $supplier)
    {
        //
    }

    /**
     * Handle the Supplier "deleted" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function deleted(Supplier $supplier)
    {
        //
    }

    /**
     * Handle the Supplier "restored" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function restored(Supplier $supplier)
    {
        //
    }

    /**
     * Handle the Supplier "force deleted" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function forceDeleted(Supplier $supplier)
    {
        //
    }
}
