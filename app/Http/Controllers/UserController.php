<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    // public function displayEmployeeProfile()
    // {
    //     return view("emp-profile");
    // }

    public function fetch_display_EmployeeProfile(Request $req){

        $user = Auth::user();
        // $id = Auth::id();
        $email = $user->email;

        $employeeObject = DB::table('users')
        ->join('employees','users.email',"=",'employees.email') 
        ->where('employees.email', $email)
        ->first();       
        $test = $employeeObject->id;
        $req->session()->put('empid', $test);
        
        return view("emp-profile", ["empObj"=> $employeeObject]);
        
    }
}
