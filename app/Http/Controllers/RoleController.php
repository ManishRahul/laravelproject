<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\RolePermission;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function showRoleSetPage(){
        return view("set-role");
}

    public function addrole(Request $req)
    {
        // $role = new Role;
        // $role->role_name = $req->role;
        // $rolename = $req->role;

        // $role->save();

        // $roles = Role::where("role_name", $rolename)->first();

        // $permissions = $req->permissions;
        // // $rolepermission = new RolePermission;

        // foreach($permissions as $permission){
        //     $rolepermission = new RolePermission;
        //     $rolepermission->role_id = $roles->id;
        //     $rolepermission->permission_id = $permission;
        //     $rolepermission->save();
        //     echo($roles->id);
        //     echo($permission);

        // }
        
        // echo("Saved Successfully");

        $user = Auth::user();
        // $id = $user->id;
        echo($user->id);
        


        
        
        
        
        
        // $ppermissions = $req->input('permissions');
        // print_r($ppermissions);
        
        
        
        
        
        
        // foreach($ppermissions as $permission){
        //     $role->permissions = $permission;
        // }






        // $role->permissions = $req->merge([
        //     'permissions' => implode(',', (array) $req->get('permissions'))
        // ]);
        // $role->permissions = $req->permissions;

        // $role->save();

        // return redirect("set-role");
    }
}
