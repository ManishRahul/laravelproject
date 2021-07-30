<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\User;
use App\Models\Role;

use Debugbar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "name" => "SuperAdmin",
            "email" => "superadmin@gmail.com",
            "password" => Hash::make("superadmin")
        ]);
        Debugbar::info("created User");

        DB::table("roles")->insert([
            "role_name" => "SuperAdmin"]);
            Debugbar::info("created Role");

        $user = User::first();
        $role = Role::first();
        Debugbar::info("fetched first User and Role"); 

        DB::table("role_user")->insert([
            "user_id" => $user->id,
            "role_id" => $role->id]);
            Debugbar::info("inserted role-id and permission-id");
    }
}
