<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $companies = Companies::get();
        $employees = Employees::get();

        return view('dashboard', [
            'companies' => $companies,
            'employees' => $employees,
        ]);
    }
}
