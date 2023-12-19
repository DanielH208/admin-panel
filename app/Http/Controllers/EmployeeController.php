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

        session()->flash("success", "Employee Added");

        return redirect("/employees");
    }


    public function create() {
        return view('employees.create');
    }

    public function index() {

        return view("employees.dashboard", [
            "employees" => Employee::paginate(15)
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

        session()->flash("success", "Employee Deleted");

        return redirect("/employees");
    }

    public function update(Employee $employee)
    {
        $attributes = request()->validate([
            "firstname" => ["required", "alpha", "max:25"],
            "lastname" => ["required", "alpha", "max:25"],
            "company" => ["required", "max:100"],
            "email" => ["string", "nullable", "max:100", "regex:/(.*)\.com$/i"],
            "phone" => ["digits_between:10,11", "integer", "nullable"]
        ]);

        $employee->update($attributes);

        session()->flash("success", "Employee Updated");

        return redirect("/employees");
    }

    public function edit(Employee $employee)
    {
        return view("employees.edit", ["employee" => $employee]);
    }
}
