<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Product_type;
use App\Models\Type;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart() // เลือกสินค้า ลงตระกร้า
    {
        // $products = Product::all();
        // $totalOrder = $products->count();

       // 0 = ตะกร้า , 1 = เช็คเอ้า
       $order = Order::where('user_id', Auth::id())->where('status', 0)->first();
       return view('user.cart')->with('order', $order);
    }
    public function in_cart(Request $request)
    {
        $product = Product::find($request->id);
        if (!$product) {
            // หากไม่พบ Product, ส่งกลับ response หรือ redirect พร้อมข้อความแจ้งเตือน
            // ส่งต่อตัวแปร $order ไปยัง view, แม้ว่าจะเป็น null ก็ตาม
            return view('user.cart')->with('order', $order);
        }

        $order = Order::where('user_id', Auth::id())->where('status', 0)->first();
        if ($order) {
            $orderDetail = $order->order_detail()->where('product_id', $product->id)->first();
            if ($orderDetail) {
                $amountNew = $orderDetail->quantity + 1;
                $orderDetail->update([
                    'quantity' => $amountNew
                ]);
            }
            else {
                $prepareCartDetail = [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    // 'product_name' => $product->product_name,
                    'quantity' => 1,
                    'price' => $product->product_price,
                ];
                $orderDetail = DetailOrder::create($prepareCartDetail);
            }
        } else {
            $prepareCart = [
                'status' => 0,
                // 'total'  => $request->price,
                'user_id' => Auth::id()
            ];


            $order = Order::create($prepareCart);

            $product = Product::find($request->product_id);
            $prepareCartDetail = [
                'order_id' => $order->id,
                'product_id' => $product->product_id,
                // 'product_name' => $product->name,
                'quantity' => 1,
                'price' => $product->product_price,
            ];
            $orderDetail = DetailOrder::create($prepareCartDetail);
        }

        $totalRaw = 0;
        $total = $order->order_detail->map(function ($orderDetail) use ($totalRaw) {
            // totalRaw = totalRaw +  $orderDetail->amount * $orderDetail->price;
            $totalRaw += $orderDetail->quantity * $orderDetail->price;
            return $totalRaw;
        })->toarray();

        $order->update([
            'total' => array_sum($total)
        ]);

        // dd($order);
        // if ($request->expectsJson()) {
        //     return response()->json(['total' => $order]);
        // } else {
        //     return redirect()->route('page.shopping');
        // }
        return redirect()->route('page.shopping');
    }
    public function del_inCart($id){
        // dd($id);
        DetailOrder::find($id)->delete();
        // dd($id);
        return redirect('/shopping/cart') ;
    }

    public function checkout(Request $request)
    {
        $order = Order::Where('total');
        // dd($order);
        return ('kuy') ;
    }

    public function updateQuantity(Request $request, $detailId) // ปุ่มเพิ่มจำนวนในหน้า cart
{
    $detail = DetailOrder::find($detailId);
    if (!$detail) {
        return response()->json(['success' => false]);
    }

    if ($request->type == 'increase') {
        $detail->quantity++;
    } else if ($request->type == 'decrease' && $detail->quantity > 1) { // ตรวจสอบไม่ให้จำนวนน้อยกว่า 1
        $detail->quantity--;
    }

    $detail->save();

    return response()->json(['success' => true, 'newQuantity' => $detail->quantity]);
}

}
