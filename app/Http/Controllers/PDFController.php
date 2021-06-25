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
        $ename_qualifications = Employee::where("id", $employeeID)->first();

        $this->fpdf = new Fpdf;
        $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->SetFont('Helvetica','',10);    
        $this->fpdf->Text(5, 5, "Three38 Innovation Cafe");   
        $this->fpdf->Text(10, 15, "Fullname : $ename_qualifications->fname $ename_qualifications->lname");       
        $this->fpdf->Text(10, 20, "Email : $ename_qualifications->email");   
        $this->fpdf->Text(10, 25, "Phone no. : $ename_qualifications->phone");
        $this->fpdf->Text(10, 30, "Designation : $ename_qualifications->designation");
        $this->fpdf->Text(10, 35, "Salary : $ename_qualifications->salary");
        $this->fpdf->Output();
        exit;
    }
}
