<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user){
        foreach($user->roles as $role){
            Debugbar::info("Entered edit permission method");
            foreach($role->permissions as $permission){
                Debugbar::info("Entered edit permission method");
                if($permission->id == 2){
                    return true;
                }
            }
        }
        return false;
    }
}
