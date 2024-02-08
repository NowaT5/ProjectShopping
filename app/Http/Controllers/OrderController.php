<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status_payment;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order()
    {
        $order = order::all();
        $stats = DB::table('status_payments')->get();
        $emps = DB::table('employees')->get();
        return view('admin.order',compact('order','stats', 'emps'));
    }


    // public function change($id)
    // {
    //     $order=order::find($id);
    //     $data=[
    //         $stat=>!$order->status_payment_id
    //     ];
    //     $order=order::find($id)->update($data);
    //     return redirect()->back();
    // }
    public function del_order($id)
    {
        Order::find($id)->delete();
        return redirect('/order');
    }
}
