<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store() {

        $attributes = request()->validate([
            "firstname" => ["required", "string"],
            "lastname" => ["required", "string"],
            "company" => ["required"],
            "email" => ["string", "nullable"],
            "phone" => ["size:11", "nullable"]
        ]);


        Employee::create($attributes);

        return redirect("/dashboard")->with('status', 'Employee added');
    }
}
