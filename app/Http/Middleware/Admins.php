<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Debugbar;

class Admins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $roles = Auth::user()->roles;
            // dd($roles);
            foreach($roles as $role){
                if($role->role_name == 'SuperAdmin' || $role->role_name == 'Admin')
                {
                    Debugbar::info("Entered Admins Middleware");
                    return $next($request);
                }
            }
            Debugbar::info("Did not enter Admins Middleware");
            return redirect('/about-company');
        }
        else{
            return redirect('/');
        }
        // return $next($request);
    }
}
