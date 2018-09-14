<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function all()
    {
        return Department::all();
    }

    public function one($id)
    {
        return Department::find($id);
    }

    public function employees($id)
    {
        return Department::find($id)->employees;
    }

    public function projects($id)
    {
        return Department::find($id)->projects;
    }

    public function locations($id)
    {
        return Department::find($id)->locations;
    }
}
