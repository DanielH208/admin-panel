<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function company() {
        return $this->belongsTo(Company::class, "id");
    }

    public static function findCompany($id) {
        $comp = Company::find($id);
        return $comp->name;
    }
}
