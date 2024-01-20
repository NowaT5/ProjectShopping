<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function type(){
        return view('admin.type');
    }
    public function product(){
        return view('admin.product');
    }
}
