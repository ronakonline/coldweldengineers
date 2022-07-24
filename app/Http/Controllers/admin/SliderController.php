<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index(){
        $data = Slider::all();
        return view('admin.slider.index')->with('data',$data);
    }

    public function add(){
        return view('admin.slider.add');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $data = new Slider();
        $data->slider_img = $imageName;
        $data->slider_title = $request->title;
        $data->save();


        return back()->with('success','Slider Added Successfully');
    }
}
