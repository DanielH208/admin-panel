<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store() {

        // $attributes = request()->validate([
        //     "name" => "required"
        // ]);


        Employee::create(request()->all());

        return redirect("/dashboard")->with('status', 'Employee added');
    }
}
