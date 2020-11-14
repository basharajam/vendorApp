<?php

namespace Database\Seeders;

use App\Models\Supplier;
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
        $supplier = Supplier::factory()->count(1)->create()[0];
        $user_id = \DB::table('users')->insertGetId([
            'name' => 'supplier',
            'email' => 'supplier2020@gmail.com',
            'password' => bcrypt('12345678'),
            'userable_type'=>'App\\Models\\Supplier',
            'userable_id'=>$supplier->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $supplier_role = Role::whereName(\App\Constants\UserRoles::SUPPLIER)->first();

        if ($supplier_role) {
            $supplier_role->users()->attach($user_id);
        }
        $wp_user = WpugUser::create([
            "user_login" =>$supplier->first_name,
            "user_pass"=>bcrypt(request()->password) ,
            "user_nicename" =>$supplier->first_name,
            "user_email"=>$supplier->email ,
            "user_url" =>'',
            "user_registered" =>$supplier->created_at,
            "display_name" =>$supplier->first_name . ' '. $supplier->last_name,
        ]);

        $wp_user_meta =UserMeta::create([
            "user_id" =>$wp_user->id,
            "meta_key" =>'user_id',
            "meta_value" =>$user_id,
        ]);

    }
}
