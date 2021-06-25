<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['fname','lname','gender','email','phone','designation','salary'];

    public static function getEmployee(){
        $records = DB::table('employees')->select('id','fname','lname','gender','email','phone','designation','salary')->get()->toArray();
        return $records;
    }
}
