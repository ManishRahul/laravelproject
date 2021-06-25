<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'Id',
            'FirstName',
            'LastName',
            'Gender',
            'Email',
            'Phone',
            'Designation',
            'Salary'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // return AppModelsEmployee::all();
       return collect(Employee::getEmployee());
    }
}
