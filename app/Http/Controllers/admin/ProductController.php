<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    //
    public function index(){
        $data = Product::all();
        return view('admin.product.index')->with('data',$data);
    }

    public function add(){
        return view('admin.product.add');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
            ]);

            if($request->hasfile('images'))
            {
               $product = new Product;
               $product->title = $request->title;
               $product->desc = $request->desc;
               $product->rank = $request->rank;
               $product->save();
               if ($request->hasFile('images')) {
                $images = $request->file('images');
                    foreach ($images as $image) {
                        $imageName = md5(rand(1000, 10000)) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('images'), $imageName);
                        $product->images()->create(['img' => $imageName]);
                    }
                }
            }

            return back()->with('success', 'Product inserted successful');

    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit')->with('product',$product);
    }

    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
            ]);
            $product = Product::find($id);
            $product->title = $request->title;
            $product->desc = $request->desc;
            $product->is_active = $request->is_active ? true : false;

            if($request->hasfile('images'))
            {

               if ($request->hasFile('images')) {
                $images = $request->file('images');
                    foreach ($images as $image) {
                        $imageName = md5(rand(1000, 10000)) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('images'), $imageName);
                        $product->images()->create(['img' => $imageName]);
                    }
                }
            }

            $product->save();

            $images = explode(',', $request->delete_images);
            //  dd($images);
            foreach ($images as $image) {
                $image = ProductImage::where('img', $image)->first();
                if ($image) {
                    if ($image->product_id== $id) {
                        $image->delete();
                        unlink(public_path("images/" . $image->img));
                    }
                }
            }

            // $productimages = $product->images()->get();
            //     foreach ($productimages as $image) {
            //         unlink(public_path('images/' . $image->img));
            //         $image->delete();
            //     }



            return back()->with('success', 'Product Updated successful');
    }

    public function delete($id){
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        } else {

            $productimages = $product->images()->get();
            foreach ($productimages as $image) {
                unlink(public_path('images/' . $image->img));
                $image->delete();
            }

            $product->delete();
            return back()->with('success', 'Product deleted successful');
        }
    }
}
