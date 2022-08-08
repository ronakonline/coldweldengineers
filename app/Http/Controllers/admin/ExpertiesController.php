<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Experties;
use App\Models\ExpertiesImages;

class ExpertiesController extends Controller
{
    public function index(){
        $data = Experties::all();
        return view('admin.experties.index')->with('data',$data);
    }

    public function add(){
        return view('admin.experties.add');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
            ]);

            if($request->hasfile('images'))
            {
               $experties = new Experties;
               $experties->title = $request->title;
               $experties->desc = $request->desc;
               $experties->rank = $request->rank;
               $experties->save();
               if ($request->hasFile('images')) {
                $images = $request->file('images');
                    foreach ($images as $image) {
                        $imageName = md5(rand(1000, 10000)) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('images'), $imageName);
                        $experties->images()->create(['img' => $imageName]);
                    }
                }
            }

            return back()->with('success', 'experties inserted successful');

    }

    public function edit($id){
        $experties = Experties::find($id);
        return view('admin.experties.edit')->with('experties',$experties);
    }

    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
            ]);
            $experties = Experties::find($id);
            $experties->title = $request->title;
            $experties->desc = $request->desc;
            $experties->rank = $request->rank;
            $experties->is_active = $request->is_active ? true : false;


            if($request->hasfile('images'))
            {

               if ($request->hasFile('images')) {
                // $expertiesimages = $experties->images()->get();
                // foreach ($expertiesimages as $image) {
                //     unlink(public_path('images/' . $image->img));
                //     $image->delete();
                // }
                $images = $request->file('images');
                    foreach ($images as $image) {
                        $imageName = md5(rand(1000, 10000)) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('images'), $imageName);
                        $experties->images()->create(['img' => $imageName]);
                    }
                }
            }

            $experties->save();

            $images = explode(',', $request->delete_images);
            //  dd($images);
            foreach ($images as $image) {
                $image = ExpertiesImages::where('img', $image)->first();
                if ($image) {
                    if ($image->experties_id== $id) {
                        $image->delete();
                        unlink(public_path("images/" . $image->img));
                    }
                }
            }

            return back()->with('success', 'experties Updated successful');
    }

    public function delete($id){
        $experties = Experties::find($id);
        if (!$experties) {
            abort(404);
        } else {

            $expertiesimages = $experties->images()->get();
            foreach ($expertiesimages as $image) {
                unlink(public_path('images/' . $image->img));
                $image->delete();
            }

            $experties->delete();
            return back()->with('success', 'experties deleted successful');
        }
    }
}
