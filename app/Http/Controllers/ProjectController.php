<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function all()
    {
        return Project::all();
    }

    public function one($id)
    {
        return Project::find($id);
    }

    public function employees($id)
    {
        return Project::find($id)->employees;
    }

    public function department($id)
    {
        return Project::find($id)->department;
    }
}
