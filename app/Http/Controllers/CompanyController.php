<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Rule;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store() {

        $attributes = request()->validate([
            "name" => ["required", "string", "max:100"],
            "email" => ["string", "nullable", "unique:companies", "max:100", "regex:/(.*)\.com$/i"],
            "logo" => ["image"],
            "website" => ["string", "nullable", "url", "max:1000"],
        ]);


        if (isset($attributes["logo"])) {
            $attributes["logo"] = request()->file("logo")->store("logos");
        };


        Company::create($attributes);

        session()->flash("success", "Company Added");

        return redirect("/companies");
    }

    public function create() {
        return view('companies.companies');
    }

    public function index() {

        return view("companies.index", [
            "companies" => Company::paginate(15)
        ]);

    }

    public function show(Company $company) {
        return view("companies.show-company", [
            "company" => $company
        ]);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        session()->flash("success", "Company Deleted");

        return redirect("/companies");
    }


    public function update(Company $company)
    {
        $attributes = request()->validate([
            "name" => ["required", "string", "max:100"],
            "email" => ["string", "nullable", "max:100", "regex:/(.*)\.com$/i"],
            "logo" => ["image"],
            "website" => ["string", "nullable", "url", "max:1000"],
        ]);


        if (isset($attributes["logo"])) {
            $attributes["logo"] = request()->file("logo")->store("logos");
        };

        $company->update($attributes);

        session()->flash("success", "Company Updated");

        return redirect("/companies");
    }

    public function edit(Company $company)
    {
        return view("companies.edit", ["company" => $company]);
    }


}
