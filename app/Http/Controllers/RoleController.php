<?php

namespace App\Http\Controllers;
use App\Models\Role;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function showRoleSetPage(){
        return view("set-role");
}

    public function addrole(Request $req)
    {
        $role = new Role;

        $role->role_name = $req->role;
        $role->permissions = $req->permissions;

        
        
        
        
        
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
