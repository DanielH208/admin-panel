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
            "name" => ["required", "string"],
            "logo" => ["image"],
            "email" => ["string", "nullable"],
            "website" => ["string", "nullable"],
        ]);


        if (isset($attributes["logo"])) {
            $attributes["logo"] = request()->file("logo")->store("logos");
        };


        Company::create($attributes);

        return redirect("/dashboard")->with('status', 'company added');
    }
}
