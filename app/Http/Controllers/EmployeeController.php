<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Employee;
use Excel;
use App\Imports\EmployeeImport;
use App\Exports\EmployeeExport;

class EmployeeController extends Controller
{
    //
    public function addEmployee(){
        if(Gate::denies('permissions.create')){
            abort(403);
        }
        return view("add-emp");
}

public function storeEmployee(Request $req){
    if(Gate::denies('permissions.create')){
        abort(403);
    }
    if($req->isMethod("post")){
        $req->validate([
            "fname" => "required|alpha",
            "lname" => "required|alpha",
            "gender" => "required",
            "email" => "required|unique:employees,email",
            "phone" => "required|digits_between:9,11|numeric",
            "desig" => "required",
            "sal" => "required|numeric"
        ]);
    }
    // print_r($req->all());

    $emp = new Employee;
    
    $emp->fname = $req->fname;    
    $emp->lname = $req->lname;
    $emp->gender = $req->gender;
    $emp->email = $req->email;
    $emp->phone = $req->phone;
    $emp->designation = $req->desig;
    $emp->salary = $req->sal;

    //save data
    $emp->save();

    $req->session()->flash("success", "Employee has been created successfully");

    return redirect("addemp");

}

public function retriveEmployee(){
    if(Gate::denies('permissions.view')){
        abort(403);
    }

    $employees = Employee::all();   
    return view("display-employees", ["emps" => $employees]);

    // $employees = Employee::where("id", 1)->first();
    // echo "<pre>";
    // print_r($employees->lname);
}

public function deleteEmployee(Request $req, $employeeId){
    $employee = Employee::find($employeeId);
    $employee->delete();

    session()->flash("success", "Employee has been delete successfully");

    return redirect("fetchemp");

}

public function showEmployeeToUpdate($employeeId){
    $employee = Employee::find($employeeId);
    return view("update",["emp_update"=>$employee]);
}

public function updateEmployee(Request $req){
    //print_r($req->all());
    $employee = Employee::find($req['emp_id']);
    //print_r($employee);
    $employee->fname = $req['fname'];
    $employee->lname = $req['lname'];
    $employee->gender = $req['gender'];
    $employee->email = $req['email'];
    $employee->phone = $req['phone'];
    $employee->designation = $req['desig'];
    $employee->salary = $req['sal'];

    $employee->save();

    session()->flash("emp_update_success","Employee data has been updated Successfully");

    return redirect("fetchemp");
}

public function importForm()
    {
        if(Gate::denies('admin')){
            abort(403);
        }
        return view('import-form');
    }

    public function import(Request $req){
        Excel::import(new EmployeeImport,$req->file);
        return "Records are imported successfully";
    }

    public function exportIntoExcel()
    {
        if(Gate::denies('admin')){
            abort(403);
        }
        return Excel::download(new EmployeeExport,'ExportedList.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new EmployeeExport,'ExportedList.csv');
    }

}
