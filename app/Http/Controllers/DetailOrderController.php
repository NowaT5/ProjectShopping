<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;

class DetailOrderController extends Controller
{
    public function detailorder(){
        $order_details = DetailOrder::all();
        return view('admin.detail',compact('order_details'));
    }
}
