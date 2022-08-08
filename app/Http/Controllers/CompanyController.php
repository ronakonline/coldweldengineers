<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //
    public function index() {
        $data = Company::all();
        return view('site.company.index')->with('data',$data);
    }
}
