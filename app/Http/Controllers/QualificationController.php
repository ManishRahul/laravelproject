<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class QualificationController extends Controller
{
        
    public function displayQualificaitonPage(){
        $empid = session('empid');
        $getqualification = Qualification::select("*")->where("emp_id", $empid)->get();
        return view("add-qualification", ["qualifications" => $getqualification]);
    }

    public function addQualification(Request $req){

        if($req->isMethod("post")){
            $req->validate([
                "dtype" => "required|alpha",
                "pursuing" => "required|alpha",
                "college" => "required",
                "degree" => "required",
                "stream" => "required",
                "marks" => "required|digits_between:1,3|numeric"
            ]);
        }

        $qualification = new Qualification;

        $qualification->emp_id = $req->empid;
        $qualification->degreetype = $req->dtype;
        $qualification->pursuing = $req->pursuing;
        $qualification->college = $req->college;
        $qualification->degree = $req->degree;
        $qualification->stream = $req->stream;
        $qualification->performance = $req->marks;

        //save data
        $qualification->save();

        $req->session()->flash("qualificationsuccess", "Your Qualification details has been saved successfully");
         return redirect("emp-qualification");


        // $empid = session('empid');
        // $getqualification = Qualification::select("*")->where("emp_id", $empid)->get();
        // return view("add-qualification", ["qualifications" => $getqualification]);
    }

    public function displayQualificationInfo(){

        $empid = session('empid');
        // echo ($empid);
        // $getqualification = Qualification::where("emp_id", $empid)->first();
        $getqualification = Qualification::select("*")->where("emp_id", $empid)->get();
        // echo "$getqualification->stream";
        // $getqualification = Qualification::all();  
        return view("view-qualification", ["qualifications" => $getqualification]);
        // $test= $getqualification;
        // echo "$test->college";
        // return view("view-qualification", ["qualifications" => $test]);
        
        // echo(gettype($getqualification));
         
        // $employees = Employee::where("emp_id", 1)->first();
        // echo "<pre>";
        // print_r($employees->lname);
    }

    public function deleteOptionforEmployee($q_id){
        $qualification_id = Qualification::find($q_id);
        $qualification_id->delete();
        return redirect('emp-qualification');
    }

    public function show_qualificaiton_info_to_edit($q_id){
        $edit_qualification = Qualification::find($q_id);
        // print_r($edit_qualifications);
        return view("edit-qualification",["qualification"=>$edit_qualification]);
    }

    public function editQualification(Request $req){
        $qualification = Qualification::find($req['id']);
        // print_r($qualification);
        $qualification->emp_id = $req['empid'];
        $qualification->degreetype = $req['dtype'];
        $qualification->pursuing = $req['pursuing'];
        $qualification->college = $req['college'];
        $qualification->degree = $req['degree'];
        $qualification->stream = $req['stream'];
        $qualification->performance = $req['marks'];

        $qualification->save();

        return redirect("emp-qualification");
    }

    public function displayQualificationsToAdmin(){
        $ename_qualifications = DB::table('employees')
        ->join('qualifications','qualifications.emp_id',"=",'employees.id')
        ->get(); 
        // print_r($qualifications);
        return view('a-emp-qualification',["e_qualifications" => $ename_qualifications]);
    }

}
