<?php

namespace App\services;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeService
{
    public function createEmployee(Request $request): void
    {
        DB::beginTransaction();

        $employee = Employee::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'   => $request->address
        ]);

        $employee->department->create([
           'name' => $request->departmentName,
        ]);


        foreach ($request->achievements as $achievement) {
            $employee->achievements->create([
               'name' => $achievement
            ]);
        }

        DB::commit();
    }
}
