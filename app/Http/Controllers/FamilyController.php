<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;
use Illuminate\Support\Facades\DB;

class FamilyController extends Controller
{

    public function displayFamily(){
        $empid = session('empid');
        $getfamily = Family::select("*")->where("emp_id", $empid)->get();
        return view("emp-family", ["relations" => $getfamily]);
    }

    public function addFamily(Request $req){
    
        $fam = new Family;
        $fam->emp_id = $req->empid;
        $fam->name = $req->name;
        $fam->relation = $req->relation;
        $fam->age = $req->age;
        $fam->job = $req->job;
    
        //save data
        $fam->save();
    
        $req->session()->flash("familysuccess", "Family info has been added successfully");
    
        return redirect("emp-fam");
    
    }

    public function deleteOptionforEmployee($fam_id){
        $relation_id = Family::find($fam_id);
        $relation_id->delete();
        return redirect('emp-fam');
    }

    public function show_relation_info_to_edit($fam_id){
        $edit_relation = Family::find($fam_id);
        // print_r($edit_relation);
        return view("edit-family",["relation"=>$edit_relation]);
    }

    public function editRelation(Request $req){
        $relation = Family::find($req['id']);
        // print_r($qualification);
        $relation->emp_id = $req['empid'];
        $relation->name = $req['name'];
        $relation->relation = $req['relation'];
        $relation->age = $req['age'];
        $relation->job = $req['job'];

        $relation->save();

        return redirect("emp-fam");
    }

    public function displayFamiliesToAdmin(){
        $ename_relations = DB::table('employees')
        ->join('family','family.emp_id',"=",'employees.id')
        ->get(); 
        // print_r($qualifications);
        return view('a-emp-family',["e_relations" => $ename_relations]);
    }
}
