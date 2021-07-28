<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;
// use App\Policies\EmployeePolicy;
use Debugbar;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        Employee::class => EmployeePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // $this->getRoleAndCheckAccess();
        
        Gate::define('permissions.createrole','App\Policies\EmployeePolicy@createrole');
        Gate::define('permissions.viewprofile','App\Policies\EmployeePolicy@viewprofile');

        Gate::resource('permissions','App\Policies\EmployeePolicy');

       
            Gate::define('admin',function(User $user){
                return $user->hasRoles('admin');
            });
       
            // $role = Role::all();

            // Gate::define($role->role_name,function(User $user){
            //     return $user->hasRoles('admin');
            // });

        
        
        // Gate::define('edit',function(User $user, Role $role){
        //     $role_id = $user->hasRolesPermission('admin');
        //     return $role->hasPermissions($role_id);
        // });
        
    }

    //gets each role and and checks if user has that role
    // public function getRoleAndCheckAccess(){
    //     $roles = Role::all();
    //     Debugbar::info("Entered for loop");
    //     foreach($roles as $role)
    //     {
            
    //         Gate::define('admin',function(User $user){
    //             Debugbar::info("Entered Gate");
    //             return $user->hasRoles('admin');
    //         });
    //     }
    // }
}
