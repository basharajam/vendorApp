<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\SupplierManager;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\Models\WP\WpugUser;
use App\Models\WP\UserMeta;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->create_supplier();
        $this->create_supplier_manager();
    }

    private function create_supplier(){
        $supplier = Supplier::factory()->count(1)->create()[0];
        $supplier_role = Role::whereName(\App\Constants\UserRoles::SUPPLIER)->first();
        $user_id = User::updateORCreate(["userable_id"=>$supplier->id, 'userable_type'=>'App\\Models\\Supplier'],[
            'name' => 'supplier',
            'email' => 'supplier2020@gmail.com',
            'password' => bcrypt('12345678'),
            'userable_type'=>'App\\Models\\Supplier',
            'userable_id'=>$supplier->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->id;

        if ($supplier_role) {
            $supplier_role->users()->attach($user_id);
        }
        $wp_supplier_user = WpugUser::create([
            "user_login" =>$supplier->first_name,
            "user_pass"=>bcrypt('12345678'),
            "user_nicename" =>$supplier->first_name,
            "user_email"=>$supplier->email ,
            "user_url" =>'',
            "user_registered" =>$supplier->created_at,
            "display_name" =>$supplier->first_name . ' '. $supplier->last_name,
        ]);
        $wp_supplier_user_meta =UserMeta::create([
            "user_id" =>$wp_supplier_user->id,
            "meta_key" =>'user_id',
            "meta_value" =>$user_id,
        ]);

    }
    private function create_supplier_manager(){
        $supplier_manager = SupplierManager::factory()->count(1)->create()[0];

        $supplier_manager_user = User::firstOrCreate([
            'name' => 'supplier_namager',
            'email' => 'supplier_manager@gmail.com',
            'password' => bcrypt('12345678'),
            'userable_type'=>'App\\Models\\SupplierManager',
            'userable_id'=>$supplier_manager->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->id;

        $supplier_manager_role = Role::whereName(\UserRoles::SUPPLIERMANAGER)->first();

        if($supplier_manager_role){
            $supplier_manager_role->users()->attach($supplier_manager_user);

        }

        $wp_supplier_manger_user = WpugUser::create([
            "user_login" =>$supplier_manager->first_name,
            "user_pass"=>bcrypt('12345678') ,
            "user_nicename" =>$supplier_manager->first_name,
            "user_email"=>$supplier_manager->email ,
            "user_url" =>'',
            "user_registered" =>$supplier_manager->created_at,
            "display_name" =>$supplier_manager->first_name . ' '. $supplier_manager->last_name,
        ]);


        $wp_supplier_manager_user_meta =UserMeta::create([
            "user_id" =>$wp_supplier_manger_user->id,
            "meta_key" =>'user_id',
            "meta_value" =>$supplier_manager_user,
        ]);

    }
}
