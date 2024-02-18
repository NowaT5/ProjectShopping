<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Product_type;
use App\Models\Type;
use App\Models\Order;
use App\Models\DetailOrder;


class CartController extends Controller

{
    public function cart($carts)
    {
        // $products = Product::all();
        // $totalOrder = $products->count();
        $viewCart = $carts;

        return view('user.cart', compact('viewCart'));
    }
    public function in_cart(Request $request,$id)
    {

        $carts =
        [
            $request->input($id)
        ];

        $new_order = new DetailOrder;
        $new_order->product_id = $request->id;
        $new_order->type_id = $request->type_id;
        $new_order->save();

        // dd($cart);
        return view('user.cart',compact('carts'));
    }
}
