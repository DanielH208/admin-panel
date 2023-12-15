<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store() {

        $attributes = request()->validate([
            "firstname" => ["required", "alpha", "max:25"],
            "lastname" => ["required", "alpha", "max:25"],
            "company" => ["required", "max:100"],
            "email" => ["string", "nullable", "unique:employees", "max:100", "regex:/(.*)\.com$/i"],
            "phone" => ["digits_between:10,11", "integer", "nullable"]
        ]);


        Employee::create($attributes);

        return redirect("/dashboard")->with('status', 'Employee added');
    }
}
