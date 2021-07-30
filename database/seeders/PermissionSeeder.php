<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Role;
use App\Models\Permission;
use Debugbar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $permissions = array('create','edit','delete','view_employees','create_role','view_profile');
        foreach($permissions as $permission){
            DB::table("permissions")->insert([
                "permission_name" => $permission]);
            Debugbar::info($permission);    
        }

        $role = Role::first();
        Debugbar::info("fetched first Role");  


        $all_permissions = Permission::all();

        foreach($all_permissions as $single_permission){
            DB::table("role_permission")->insert([
                "role_id" => $role->id,
                "permission_id" => $single_permission->id]);
                Debugbar::info("inserted role-id and permission-id");  
        }
    }
}
