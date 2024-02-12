<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_type;
use App\Models\Type;

class PageUserController extends Controller
{
    public function index()
    {
        return view('user.page');
    }
    public function about()
    {
        return view('user.about');
    }
    public function portfolio()
    {
        return view('user.portfolio');
    }
    public function portfoliodetails()
    {
        return view('user.portfoliodetails');
    }
    public function shopping()
    {
        $products = Product::all();
        return view('user.shopping', compact('products'));
    }
}
