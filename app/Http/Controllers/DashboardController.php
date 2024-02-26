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
        $date_order = $orders->where('status_payment_id',6 )->pluck('created_at'); // label line chart
        $chart_total_order = $orders->where('status_payment_id',6 )->pluck('total'); // ยอดปิดการขาย
        $sum_all_orders = $orders->pluck('total'); //ยอดคำสั่งซื้อทั้งหมด

        $totalorders = $orders->where('status_payment_id',6 )->count();//ดึงไปแสดงตัวเลขเฉยๆ

        // $chart_total_order = $orders->where('status_payment_id',6 );
        $dateorders = Order::where('created_at','2024');
        // $product = Product::all();
        // dd($dateorders);

        $total_users = User::all()->count(); //หาจำนวน User ทั้งหมด

        // Sale rate
        // หาจำนวนสินค้าทั้งหมดที่ถูกสั่งซื้อ
        $totalProductsOrdered = DetailOrder::sum('quantity');

        // หาจำนวนสินค้าทั้งหมดในระบบ
        $totalProducts = Product::count();

        // คำนวณ Sales Rate
        if ($totalProducts > 0) {
            $salesRate = ($totalProductsOrdered / $totalProducts) * 100;
        } else {
            $salesRate = 0;
        }

        return view('admin.index', compact('products','detailorders', 'orders','productLabels','detailordersQuantity','totalorders','dateorders', 'chart_total_order','date_order','total_users','salesRate', 'sum_all_orders'));

    }
    // public function calculateSalesRate($startDate, $endDate)
    // {
    //     // หาจำนวน order ที่ถูกสร้างขึ้นในช่วงเวลาที่กำหนด
    //     $totalOrders = Order::whereBetween('created_at', [$startDate, $endDate])->count();

    //     // หายอดขายทั้งหมดในช่วงเวลาที่กำหนด
    //     $totalSales = Order::whereBetween('created_at', [$startDate, $endDate])->sum('total_price');

    //     // คำนวณ Sales Rate
    //     if ($totalOrders > 0) {
    //         $salesRate = ($totalSales / $totalOrders) * 100;
    //     } else {
    //         $salesRate = 0;
    //     }

    //     return view('admin.index', compact('salesRate'));
    // }
}
