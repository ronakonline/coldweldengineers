<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificates;

class CertificatesController extends Controller
{
    //
    public function index(){
        $data = Certificates::all();
        return view('site.certificates.index')->with('data',$data);
    }
}
