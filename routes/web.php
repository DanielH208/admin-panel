<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/companies', function () {
//     return view('companies.companies');
// })->middleware(['auth', 'verified'])->name('companies');




Route::get('/employees', function () {
    return view('employees');
})->middleware(['auth', 'verified'])->name('employees');

Route::post('/employees', [EmployeeController::class, "store"])->middleware(['auth', 'verified'])->name('employees');

// Dashboards

// Companies
Route::post('/companies', [CompanyController::class, "store"])->middleware(['auth', 'verified'])->name('companies.store');
Route::get('/companies', [CompanyController::class, "index"])->middleware(['auth', 'verified'])->name('companies.index');
Route::get('/companies/create', [CompanyController::class, "create"])->middleware(['auth', 'verified'])->name('companies.create');
Route::get('/companies/{company}', [CompanyController::class, "show"])->middleware(['auth', 'verified'])->name('companies.show');
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->middleware(['auth', 'verified'])->name('companies.destroy');

// Employees
Route::post('/employees', [EmployeeController::class, "store"])->middleware(['auth', 'verified'])->name('employees.store');
Route::get('/employees', [EmployeeController::class, "index"])->middleware(['auth', 'verified'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, "create"])->middleware(['auth', 'verified'])->name('employees.create');
Route::get('/employees/{employee}', [EmployeeController::class, "show"])->middleware(['auth', 'verified'])->name('employees.show');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->middleware(['auth', 'verified'])->name('employees.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
