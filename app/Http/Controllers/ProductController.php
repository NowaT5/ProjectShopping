<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_type;
use App\Models\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{   ////// type ///////////
    public function type() // pull type from db
    {
        $types = DB::table('types')->get();

        return view('admin.type',compact('types'));
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
    public function edittype(Request $request,$id) // Edit type
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
        return view('admin.product_type',compact('product_type'));
    }
    public function del_product_type($id) // delete type
    {
        Product_type::find($id)->delete();
        return redirect()->back();
    }
    public function add_product_type(Request $request) // add type
    {
        $new_product_type = new Product_type;
        $new_product_type->product_type_name = $request->input('product_type_name');
        $new_product_type->type_id = $request->input('type_id');
        $new_product_type->save();
        return redirect()->back();
    }
    public function edit_product_type(Request $request,$id) // Edit type
    {

        $ed_type = Product_type::find($id);
        $ed_type->type_name = $request->type_name;
        $ed_type->save();
        return redirect()->back();
    }




    /////// product ///////////////
    public function product() // pull product data from db
    {
        $product = DB::table('products')->get();
        // $product = Product::all();
        return view('admin.product', compact('product'));
    }
    // public function product_type()
    // {
    //     return view('admin.product_type');
    // }

}
