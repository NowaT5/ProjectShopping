<?php

namespace App\Http\Controllers;
use App\Models\Detail_Order;
use App\Models\Order;


use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function order_detail(){
        $order_detail = order_detail::all();
        return view('admin.detail',compact('order_detail'));
    }
    //  public function detail(){
    //     return view('admin.detail');
    // }
}
