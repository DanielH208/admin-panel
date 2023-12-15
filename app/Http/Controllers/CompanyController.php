<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store() {

        $attributes = request()->validate([
            "name" => ["required"],
            "logo" => ["image"]
        ]);


        $attributes["logo"] = request()->file("logo")->store("public/logos");

        Company::create(request()->all());

        return redirect("/dashboard")->with('status', 'company added');
    }
}
