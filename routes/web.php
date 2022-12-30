<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [Controller::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('/companies', CompaniesController::class);
Route::resource('/employees', EmployeesController::class);

require __DIR__.'/auth.php';
