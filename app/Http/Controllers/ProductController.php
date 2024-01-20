<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function type(){
        $product_type = product_type::all();
        return view('admin.type',compact('product_type'));
    }
    public function product(){
        $product = product::all();
        // $product = Product::all();
        return view('admin.product', compact('product'));
    }
    
}
