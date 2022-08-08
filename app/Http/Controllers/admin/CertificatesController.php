<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Certificates;

class CertificatesController extends Controller
{
    public function index(){
        $data = Certificates::all();
        return view('admin.certificates.index')->with('data',$data);
    }

    public function add(){
        return view('admin.certificates.add');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'file' => 'required'
            ]);

            if($request->hasfile('file'))
            {
               $certificates = new Certificates;
               $certificates->title = $request->title;
               $certificates->type = $request->type;
               $certificates->rank = 0;
               $certificates->is_active = 1;

               if ($request->hasFile('file')) {
                $file= $request->file('file');

                        $imageName = md5(rand(1000, 10000)) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images'), $imageName);
                        $certificates->file = $imageName;

                }
                $certificates->save();
            }

            return back()->with('success', 'certificates inserted successful');

    }
}
