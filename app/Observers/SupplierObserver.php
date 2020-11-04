<?php

namespace App\Observers;

use App\Models\Supplier;
use App\Models\User;

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
        User::create([
            'name'=>$supplier->first_name,
            'email'=>$supplier->email,
            'password'=>bcrypt(request()->password),
            'userable_type'=>'App\\Models\\Supplier',
            'userable_id'=>$supplier->id
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
