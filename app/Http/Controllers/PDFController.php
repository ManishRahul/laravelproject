<?php

namespace App\Http\Controllers;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class PDFController extends Controller
{
    private $fpdf;
    
    public function createPDF($employeeID)
    {
        // $ename_qualifications = DB::table('employees')
        // ->join('qualifications','qualifications.emp_id',"=",'employees.id')
        // ->where('qualifications.emp_id',$employeeID)
        // ->first();
        // print_r($ename_qualifications->lname);
        $employee = Employee::where("id", $employeeID)->first();

        // $qualification = Employee::where("id", $employeeID)->qualifications;
        // $experience = Employee::where("id", $employeeID)->experiences;

        //$qualification = Employee::find(1)->qualifications;
        // $employee->qualifications;

        $experience = Employee::find(1)->experiences;




        $this->fpdf = new Fpdf;
        $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->SetFont('Helvetica','',10);    
        $this->fpdf->Text(5, 5, "Three38 Innovation Cafe");   
        $this->fpdf->Text(10, 15, "Fullname : $employee->fname $employee->lname");       
        $this->fpdf->Text(10, 20, "Email : $employee->email");   
        $this->fpdf->Text(10, 25, "Phone no. : $employee->phone");
        $this->fpdf->Text(10, 30, "Designation : $employee->designation");
        $this->fpdf->Text(10, 35, "Salary : $employee->salary");
        foreach($employee->qualifications as $qualification ){
        $this->fpdf->Text(10, 40, "College : $qualification->college");
        }
        // $this->fpdf->Text(10, 45, "Organization : $experience->organization");
        $this->fpdf->Output();
        exit;
    }
}
