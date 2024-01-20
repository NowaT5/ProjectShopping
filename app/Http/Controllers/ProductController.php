<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function type(){
        return view('admin.type');
    }
    public function product(){
        $product = product::all();
        // $product = Product::all();
        return view('admin.product', compact('product'));
    }
}
