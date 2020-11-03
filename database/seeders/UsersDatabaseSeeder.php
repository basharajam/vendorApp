<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor_id = \DB::table('users')->insertGetId([
            'name' => 'vendor',
            'email' => 'vendor@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $vendor_role = Role::whereName(\App\Constants\UserRoles::VENDOR)->first();

        if ($vendor_role) {
            $vendor_role->users()->attach($vendor_id);
        }
    }
}
