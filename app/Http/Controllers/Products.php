<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Products extends Controller
{
    public function index(){
        $data = Product::all();
        return view('site.product.list')->with('data',$data);
    }

    public function product($id){
        $data = Product::find($id);
        return view('site.product.product')->with('product',$data);
    }
}
