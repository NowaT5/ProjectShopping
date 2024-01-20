<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(){
        return view('admin.order');
    }
    public function detail(){
        return view('admin.detail');
    }
}
