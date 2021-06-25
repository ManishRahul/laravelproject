<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
{

    public function displayExperience(){
        $empid = session('empid');
        $getexperience = Experience::select("*")->where("emp_id", $empid)->get();
        return view("emp-experience", ["experiences" => $getexperience]);
    }

    public function addExperience(Request $req){
    
        $exp = new Experience;
        
        $exp->emp_id = $req->empid;
        $exp->designation = $req->role;
        $exp->organization = $req->org;
        $exp->start_date = $req->sdate;
        $exp->end_date = $req->edate;
        $exp->description = $req->desc;
    
        //save data
        $exp->save();
    
        $req->session()->flash("success", "Your Experience has been added successfully");
    
        return redirect("emp-experience");
    
    }

    
    public function deleteOptionforEmployee($exp_id){
        $experience_id = Qualification::find($exp_id);
        $experience_id->delete();
        return redirect('emp-experience');
    }

    public function show_experience_info_to_edit($exp_id){
        $edit_experience = Experience::find($exp_id);
        // print_r($edit_experience);
        return view("edit-experience",["experience"=>$edit_experience]);
    }

    public function editExperience(Request $req)
    {
        $experience = Experience::find($req['id']);
        // print_r($experience);
        $experience->emp_id = $req['empid'];
        $experience->designation = $req['role'];
        $experience->organization = $req['org'];
        $experience->start_date = $req['sdate'];
        $experience->end_date = $req['edate'];
        $experience->description = $req['desc'];

        $experience->save();

        return redirect("emp-experience");
    }

    public function displayExperiencesToAdmin(){
        $ename_experiences = DB::table('employees')
        ->join('experiences','experiences.emp_id',"=",'employees.id')
        ->get(); 
        // print_r($ename_experiences);
        return view('a-emp-experience',["e_experiences" => $ename_experiences]);
    }
}
