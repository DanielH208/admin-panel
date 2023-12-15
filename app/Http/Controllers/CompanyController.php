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

        return redirect("/dashboard")->with('status', 'company added');
    }
}
