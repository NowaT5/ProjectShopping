<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Status_payment;
use App\Models\Employee;

class OrderController extends Controller
{
    public function order(){
        $order = order::all();
        return view('admin.order',compact('order'));
    }
   
    
    function change($id){
        $order=order::find($id);
        $data=[
            $stat=>!$order->status_payment_id
        ];
        $order=order::find($id)->update($data);
        return redirect()->back();
    }        
        // function change($id){
        //     $blog=Blog::find($id);
        //     $data=[
        //         'status'=>!$blog->status
        //     ];
        //     $blog=Blog::find($id)->update($data);
        //     return redirect()->back();
        // }
}
