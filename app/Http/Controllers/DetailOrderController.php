<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;

use Illuminate\Support\Facades\DB;

class DetailOrderController extends Controller
{
    public function detail_order()
    {
        $order_details = DB::table('detail_orders')->get();
        // dd($order_details);
        return view('admin.detail',compact('order_details'));
    }


    // public function detail_order($id)
    // {
    //     // ดึงข้อมูลรายการสั่งซื้อจากตาราง detail_orders
    //     $order_details = DB::table('detail_orders')->get();

    //     // สร้างตัวแปรเพื่อเก็บข้อมูลที่จะแสดงในตาราง
    //     $data = [];

    //     // ลูปรายการสั่งซื้อที่ดึงมา
    //     foreach ($order_details as $order_detail) {
    //         // ดึงข้อมูลสินค้าจากตาราง products โดยอ้างอิงจาก order_id
    //         $product = DB::table('products')
    //             ->where('id', $order_detail->product_id)
    //             ->first();

    //         // ดึงข้อมูลรายการสั่งซื้อจากตาราง orders
    //         $order = Order::find($order_detail->order_id);

    //         // ถ้าพบข้อมูลสินค้าและรายการสั่งซื้อ
    //         if ($product && $order) {
    //             // เพิ่มข้อมูลลงในตัวแปร $data เพื่อนำไปแสดงผลในตาราง
    //             $data[] = [
    //                 'order_id' => $order->id,
    //                 'product_id' => $product->id,
    //                 'product_name' => $product->name,
    //                 'product_price' => $product->price,
    //                 'quantity' => $order_detail->quantity,
    //                 'total_price' => $order_detail->quantity * $product->price
    //             ];
    //         }
    //     }

    //     // ส่งข้อมูลที่ดึงมาไปยัง view admin.detail
    //     return view('admin.detail', compact('data'));
    // }


}
