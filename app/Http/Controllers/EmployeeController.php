<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function all()
    {
        return Employee::all();
    }

    public function one($id)
    {
        return Employee::find($id);
    }

    public function department($id)
    {
        return Employee::find($id)->department;
    }

    public function dependents($id)
    {
        return Employee::find($id)->dependents;
    }

    public function supervisor($id)
    {
        return Employee::find($id)->supervisor;
    }

    public function supervisees($id)
    {
        return Employee::find($id)->supervisees;
    }

    public function manager($id)
    {
        return Employee::find($id)->manager;
    }

    public function projects($id)
    {
        return Employee::find($id)->projects;
    }
}
