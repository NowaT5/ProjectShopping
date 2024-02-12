<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_type;
use App\Models\Type;

class CartController extends Controller
{
    public function cart()
    {
        $products = Product::all();
        $totalOrder = $products->count();
        return view('user.cart', compact('products'));
    }
}
