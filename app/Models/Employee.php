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

    public function qualifications(){
        return $this->hasMany(Qualification::class, 'emp_id');
    }

    public function experiences(){
        return $this->hasMany(Experience::class, 'emp_id');
    }



    public function family(){
        return $this->hasMany(Family::class);
    }
}
