<?php

namespace App\Observers;

use App\Models\SupplierManager;
use App\Models\User;
use Spatie\Permission\Models\Role;


class SupplierManagerObserver
{
    /**
     * Handle the SupplierManager "created" event.
     *
     * @param  \App\Models\SupplierManager  $supplierManager
     * @return void
     */
    public function created(SupplierManager $supplierManager)
    {
        //
        $user =  User::create([
            'name'=>$supplierManager->first_name,
            'email'=>$supplierManager->email,
            'username'=>$supplierManager->username,
            'password'=>bcrypt(request()->password),
            'userable_type'=>'App\\Models\\SupplierManager',
            'userable_id'=>$supplierManager->id
        ]);
        $supplier_manager_role = Role::whereName(\App\Constants\UserRoles::SUPPLIERMANAGER)->first();
        if ($supplier_manager_role) {
            $supplier_manager_role->users()->attach($user->id);
        }
    }

    /**
     * Handle the SupplierManager "updated" event.
     *
     * @param  \App\Models\SupplierManager  $supplierManager
     * @return void
     */
    public function updated(SupplierManager $supplierManager)
    {
        //
    }

    /**
     * Handle the SupplierManager "deleted" event.
     *
     * @param  \App\Models\SupplierManager  $supplierManager
     * @return void
     */
    public function deleted(SupplierManager $supplierManager)
    {
        //
    }

    /**
     * Handle the SupplierManager "restored" event.
     *
     * @param  \App\Models\SupplierManager  $supplierManager
     * @return void
     */
    public function restored(SupplierManager $supplierManager)
    {
        //
    }

    /**
     * Handle the SupplierManager "force deleted" event.
     *
     * @param  \App\Models\SupplierManager  $supplierManager
     * @return void
     */
    public function forceDeleted(SupplierManager $supplierManager)
    {
        //
    }
}
