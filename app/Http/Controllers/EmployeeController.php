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

        return redirect("/employees")->with('status', 'Employee added');
    }


    public function create() {
        return view('employees.create');
    }

    public function index() {

        return view("employees.dashboard", [
            "employees" => Employee::paginate(10)
        ]);

    }

    public function show(Employee $employee) {
        return view("employees.show-employee", [
            "employee" => $employee
        ]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect("/employees")->with("success", "Post Deleted");
    }
}
