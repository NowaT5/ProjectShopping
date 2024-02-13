<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_type;
use App\Models\Type;
use App\Models\Order;
use App\Models\DetailOrder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{   ////// type ///////////
    public function type() // pull type from db
    {
        $types = DB::table('types')->get();

        return view('admin.type', compact('types'));
    }
    public function deltype($id) // delete type
    {
        Type::find($id)->delete();
        return redirect()->back();
    }
    public function addtype(Request $request) // add type
    {
        $newtype = new Type;
        $newtype->type_name = $request->input('type_name');
        $newtype->save();
        return redirect()->back();
    }
    public function edittype(Request $request, $id) // Edit type
    {

        $ed_type = Type::find($id);
        $ed_type->type_name = $request->type_name;
        $ed_type->save();
        // Type::update($ed_type);
        // DB::table('types')->where('id',$id)->update($newemp);
        return redirect()->back();
    }

    ////// product type ///////////
    public function product_type() // pull product type from db
    {
        $product_type = DB::table('product_types')->get();
        $types        = DB::table('types')->get();
        return view('admin.product_type', compact('product_type', 'types'));
    }
    public function del_product_type($id) // delete type
    {
        Product_type::find($id)->delete();
        return redirect()->back();
    }
    public function add_product_type(Request $request) // add type
    {
        //kong
        // $data=[
        //     'product_type_name'=>$request->product_type_name,
        //     'type_id'=>$request->type_id
        // ];
        // dd($data);
        // $types  = DB::table('types')->get();
        $new_product_type = new Product_type;
        $new_product_type->product_type_name = $request->product_type_name;
        $new_product_type->type_id = $request->type_id;
        $new_product_type->save();
        // dd($new_product_type);
        return redirect('/producttype');
    }
    public function edit_product_type(Request $request, $id) // Edit type
    {
        $ed_product_type = Product_type::find($id);
        $ed_product_type->product_type_name = $request->product_type_name;
        $ed_product_type->type_id = $request->type_id;
        $ed_product_type->save();
        return redirect()->back();
    }




    /////// product ///////////////
    public function product() // pull product data from db
    {
        $products = DB::table('products')->get();
        $product_types = DB::table('product_types')->get();
        $types        = DB::table('types')->get();
        // $product = Product::all();
        return view('admin.product', compact('products', 'product_types', 'types'));
    }
    public function add_product(Request $request)
    {

        // dd($request->all());
        //อัพโหลดรูปภาพเข้าโฟร์ดเดอร์ ในpubilc/upload
        if ($request->hasFile('product_image'))
        {
            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $imageName);
        }
        $new_product = new Product;
        $new_product->product_name = $request->product_name;
        $new_product->product_price = $request->product_price;
        $new_product->product_image = $imageName;
        $new_product->product_stock = $request->product_stock;
        $new_product->type_id = $request->type_id;
        $new_product->product_type_id = $request->product_type_id;
        $new_product->save();

        return redirect('/product');
    }

    public function edit_product(Request $request,$id)
    {
    $imageName = null; // กำหนดค่าเริ่มต้นของ $imageName เป็น null

    // ตรวจสอบว่ามีการส่งภาพสินค้ามาหรือไม่
    if ($request->hasFile('product_image'))
        {
        $image = $request->file('product_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('upload'), $imageName);
        }

    // ดำเนินการเฉพาะกรณีที่มีการส่งภาพสินค้ามา
    if ($imageName !== null)
        {
        $new_product = Product::find($id);
        $new_product->product_name = $request->product_name;
        $new_product->product_price = $request->product_price;
        $new_product->product_image = $imageName; // กำหนดรูปภาพเฉพาะเมื่อมีการส่งมา
        $new_product->product_stock = $request->product_stock;
        $new_product->type_id = $request->type_id;
        $new_product->product_type_id = $request->product_type_id;
        $new_product->save();
        }
    else
        {
        // กรณีที่ไม่มีการส่งภาพสินค้ามา
        $new_product = Product::find($id);
        $new_product->product_name = $request->product_name;
        $new_product->product_price = $request->product_price;
        // ไม่กำหนดรูปภาพเพราะไม่มีการส่งมา
        $new_product->product_stock = $request->product_stock;
        $new_product->type_id = $request->type_id;
        $new_product->product_type_id = $request->product_type_id;
        $new_product->save();
        }

    return redirect()->back();
    }

    // public function editproduct(Request $request,$id)
    // {
    //     // dd($request->all());
    //     //  อัพโหลดรูปภาพเข้าโฟร์ดเดอร์ ในpubilc/upload
    //      if ($request->hasFile('product_image')) {
    //         $image = $request->file('product_image');
    //         $imageName = time() . '_' . $image->getClientOriginalName();
    //         $image->move(public_path('upload'), $imageName);
    //     }

    //     $new_product = Product::find($id);
    //     $new_product->product_name = $request->product_name;
    //     $new_product->product_price = $request->product_price;
    //     $new_product->product_image = $imageName;
    //     $new_product->product_stock = $request->product_stock;
    //     $new_product->type_id = $request->type_id;
    //     $new_product->product_type_id = $request->product_type_id;
    //     $new_product->save();
    //     return redirect()->back();
    // }

    public function del_product($id) // delete type
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
    ////////////////// dashboard
    public function index()
    {
        $products = Product::all();
        $detailorders = DetailOrder::all();
        // $products = DB::table('products')->get();
        // $product_types = DB::table('product_types')->get();
        $orders        = Order::all();
        // $product = Product::all();
        return view('admin.index', compact('products', 'detailorders', 'orders'));
    }
}
