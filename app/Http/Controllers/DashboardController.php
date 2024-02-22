<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_type;
use App\Models\Type;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Emtype;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $productLabels = $products->pluck('product_name');

        $detailorders = DetailOrder::all();
        $detailordersQuantity = $detailorders->pluck('quantity');
        // $products = DB::table('products')->get();
        // $product_types = DB::table('product_types')->get();

        $orders = Order::all();

        $totalorders = $orders->where('status_payment_id',6 )->count();
        $chart_total_order = $orders->where('status_payment_id',6 );
        $dateorders = Order::where('created_at','2024');
        // $product = Product::all();
        // dd($dateorders);


        return view('admin.index', compact('products','detailorders', 'orders','productLabels','detailordersQuantity','totalorders','dateorders', 'chart_total_order'));

    }
}
