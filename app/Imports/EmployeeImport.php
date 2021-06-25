<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'fname' => $row['fname'],
            'lname' => $row['lname'],
            'gender' => $row['gender'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'designation' => $row['designation'],
            'salary' => $row['salary'],
        ]);
    }
}
