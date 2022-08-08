<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyImages;

class CompanyController extends Controller
{
    public function index(){
        $data = Company::all();
        return view('admin.company.index')->with('data',$data);
    }

    public function add(){
        return view('admin.company.add');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
            ]);

            if($request->hasfile('images'))
            {
               $company = new Company;
               $company->title = $request->title;
               $company->desc = $request->desc;
               $company->rank = $request->rank;
               $company->save();
               if ($request->hasFile('images')) {
                $images = $request->file('images');
                    foreach ($images as $image) {
                        $imageName = md5(rand(1000, 10000)) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('images'), $imageName);
                        $company->images()->create(['img' => $imageName]);
                    }
                }
            }

            return back()->with('success', 'company inserted successful');

    }

    public function edit($id){
        $company = Company::find($id);
        return view('admin.company.edit')->with('company',$company);
    }

    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
            ]);
            $company = Company::find($id);
            $company->title = $request->title;
            $company->desc = $request->desc;
            $company->rank = $request->rank;
            $company->is_active = $request->is_active ? true : false;


            if($request->hasfile('images'))
            {

               if ($request->hasFile('images')) {
                // $companyimages = $company->images()->get();
                // foreach ($companyimages as $image) {
                //     unlink(public_path('images/' . $image->img));
                //     $image->delete();
                // }
                $images = $request->file('images');
                    foreach ($images as $image) {
                        $imageName = md5(rand(1000, 10000)) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('images'), $imageName);
                        $company->images()->create(['img' => $imageName]);
                    }
                }
            }

            $company->save();

            $images = explode(',', $request->delete_images);
            //  dd($images);
            foreach ($images as $image) {
                $image = CompanyImages::where('img', $image)->first();
                if ($image) {
                    if ($image->company_id== $id) {
                        $image->delete();
                        unlink(public_path("images/" . $image->img));
                    }
                }
            }

            return back()->with('success', 'Company Updated successful');
    }

    public function delete($id){
        $company = Company::find($id);
        if (!$company) {
            abort(404);
        } else {

            $companyimages = $company->images()->get();
            foreach ($companyimages as $image) {
                unlink(public_path('images/' . $image->img));
                $image->delete();
            }

            $company->delete();
            return back()->with('success', 'Company deleted successful');
        }
    }

}
