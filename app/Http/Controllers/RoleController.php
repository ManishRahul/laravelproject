<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\Permission;

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
        $rolename = $req->role;

        $role->save();

        $roles = Role::where("role_name", $rolename)->first();

        $permissions = $req->permissions;
        // $rolepermission = new RolePermission;

        foreach($permissions as $permission){
            $rolepermission = new RolePermission;
            $rolepermission->role_id = $roles->id;
            $rolepermission->permission_id = $permission;
            $rolepermission->save();
            echo($roles->id);
            echo($permission);

        }
        
        echo("Saved Successfully");
        
    }

    public function displayRoles(){
        return view();
    }

    public function retriveRoles(){
        $roles = Role::all();
        return view('view-roles',["roles"=>$roles]);
        
    }

    public function showRoleToEdit($roleId){
        $role = Role::find($roleId);
        $permissions = Permission::all();
        // foreach($role->permissions as $permission){
        //     echo( $permission->permission_name. "<br>");
        // }
        // return $role->permissions;
        return view("edit-role",["role"=>$role, "rolepermissions"=>$role->permissions, "permissions"=>$permissions]);
    }

    public function editRole(Request $req){
        $role = Role::find($req['role_id']);
        $role->role_name = $req['role'];
        $role->save();

        $permissions = $req->permissions;

        $role->permissions()->sync($permissions);

        return redirect("get-roles");

    }

    public function deleteRole(Request $req, $roleId){
        $role = Role::find($roleId);
        $role->delete();

    session()->flash("success", $role->role_name. "Role has been deleted");

    return redirect("get-roles");
    }

}
    