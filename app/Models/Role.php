<?php

namespace App\Models;
use App\Models\User;
use App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, RolePermission::class);
    }

    // public function hasPermissions($roleid){
    //     foreach($this->permissions as $permission)
    //     {
    //         Debugbar::info($permission->role_id);
    //         if($permission->role_id === $roleid){
    //             Debugbar::info("Permission allowed");
    //             return true;
    //         }
    //     }
    //     Debugbar::info("Dint execute this");
    //     return false;
    // }
}
