<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Debugbar;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return mixed
     */
    public function view(User $user)
    {
        foreach($user->roles as $role){
            Debugbar::info("Entered $role->role_name role");
            foreach($role->permissions as $permission){
                if($permission->id == 4){
                    Debugbar::info("Entered $permission->permission_name permission");
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        foreach($user->roles as $role){
            Debugbar::info("Entered $role->role_name role");
            foreach($role->permissions as $permission){
                if($permission->id == 1){
                    Debugbar::info("Entered $permission->permission_name permission");
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return mixed
     */
    public function update(User $user)
    {
        foreach($user->roles as $role){
            Debugbar::info("Entered $role->role_name role");
            foreach($role->permissions as $permission){
                if($permission->id == 2){
                    Debugbar::info("Entered $permission->permission_name permission");
                    return true;
                }
            }
        }
        return false;
    }

    public function createrole(User $user)
    {
        foreach($user->roles as $role){
            Debugbar::info("Entered $role->role_name role");
            foreach($role->permissions as $permission){
                if($permission->id == 6){
                    Debugbar::info("Entered $permission->permission_name permission");
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach($user->roles as $role){
            Debugbar::info("Entered $role->role_name role");
            foreach($role->permissions as $permission){
                if($permission->id == 3){
                    Debugbar::info("Entered $permission->permission_name permission");
                    return true;
                }
            }
        }
        return false;
    }
     
    public function viewprofile(User $user)
    {
        foreach($user->roles as $role){
            Debugbar::info("Entered $role->role_name role");
            foreach($role->permissions as $permission){
                if($permission->id == 5){
                    Debugbar::info("Entered $permission->permission_name permission");
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return mixed
     */
    public function restore(User $user, Employee $employee)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employee  $employee
     * @return mixed
     */
    public function forceDelete(User $user, Employee $employee)
    {
        //
    }
}
