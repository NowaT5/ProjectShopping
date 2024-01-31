<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_type;
use App\Models\Type;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function type(){
        $types = Type::all();
        return view('admin.type',compact('types'));
    }
    public function product(){
        $product = product::all();
        // $product = Product::all();
        return view('admin.product', compact('product'));
    }

}
