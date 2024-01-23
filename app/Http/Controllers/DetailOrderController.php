<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;

class DetailOrderController extends Controller
{
    public function detailorder(){
        $order_detail = DetailOrder::all();
        return view('admin.detail',compact('order_detail'));
    }
}
