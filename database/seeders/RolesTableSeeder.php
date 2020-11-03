<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate(['name' => \App\Constants\UserRoles::VENDOR,'guard_name'=>'web']);
        $role = Role::firstOrCreate(['name' => \App\Constants\UserRoles::VENDORADMIN,'guard_name'=>'web']);

    }
}
