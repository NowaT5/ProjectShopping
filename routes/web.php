<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tambon;

// back
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\NewEmployeeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TambonController;

// front
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route ของ login และ Register
Route::get('/',[LoginController::class,'index'])->name('login');
Route::get('/registers',[LoginController::class,'register'])->name('register');

Route::get('/admin',[ProductController::class,'index'])->name('page'); //หน้าแดชบอร์ด

//Route User
Route::get('/user',[AdminController::class,'user'])->name('user'); // รายชื่อลูกค้า

// Employee
Route::get('/employee',[AdminController::class,'employee'])->name('employee'); // แสดงรายชื่อพนักงาน
Route::get('/newemp',[NewEmployeeController::class,'newemp']); // หน้ากรอกข้อมูล
Route::post('/addemp',[NewEmployeeController::class,'addemp']); // ปุ่มบันทึก
Route::get('/employee/delete/{id}',[AdminController::class,'delemp'])->name('employee.delemp'); // ฟังชั่นลบ
Route::post('/editemp/{id}',[AdminController::class,'editemp'])->name('employee.edit'); // ปุ่ม Edit

// type route
Route::get('/type',[ProductController::class,'type'])->name('type'); // หน้าชนิดสินค้า
Route::post('/addtype',[ProductController::class,'addtype']); // ปุ่มบันทึก
Route::post('/edittype/{id}',[ProductController::class,'edittype'])->name('type.edit'); // ปุ่มแก้ไข
Route::get('/deltype/{id}',[ProductController::class,'deltype'])->name('deltype'); // ปุ่มลบ

// Category route
Route::get('/producttype',[ProductController::class,'product_type'])->name('producttype'); // หน้าประเภทสินค้า
Route::post('/addproducttype',[ProductController::class,'add_product_type'])->name('addproducttype'); // ปุ่มบันทึก
Route::post('/editproducttype/{id}',[ProductController::class,'edit_product_type'])->name('editproducttype.edit'); // ปุ่มแก้ไข
Route::get('/delproducttype/{id}',[ProductController::class,'del_product_type'])->name('del.producttype'); // ปุ่มลบ

// product detail route
Route::get('/product',[ProductController::class,'product'])->name('product'); //แสดงรายการสินค้า
Route::get('/delproduct/{id}',[ProductController::class,'del_product'])->name('del.product'); // ปุ่มลบ
Route::post('/addproduct',[ProductController::class,'add_product'])->name('add.product'); // ปุ่มบันทึก
Route::post('/editproduct/{id}',[ProductController::class,'edit_product'])->name('edit.product'); // ปุ่มแก้ไข

// Route Order
Route::get('/order',[OrderController::class,'order'])->name('order'); //แสดงรายการสั่งซื้อ
Route::post('/editorder/{id}',[OrderController::class,'edit_order'])->name('edit.order'); // แก้ไข Order
Route::get('/delorder}/{id}',[OrderController::class,'del_order'])->name('del.order'); // ลบ Order

// Route Detail order
Route::get('/detail/{id}',[DetailOrderController::class,'detail_order'])->name('detail'); //แสดงรายละเอียดคำสั่งซื้อ

//Route Page เอาไว้แสดงหน้าของ Page เท่านั้น
Route::get('/page',[PageUserController::class,'index'])->name('Home');
Route::get('/about',[PageUserController::class,'about'])->name('About');
Route::get('/portfolio',[PageUserController::class,'portfolio'])->name('Portfolio');
Route::get('/portfoliodetails',[PageUserController::class,'portfoliodetails'])->name('Portfoliodetails');
Route::get('/page/shopping',[PageUserController::class,'shopping'])->name('page.shopping');

// Route ตระกร้า
Route::get('/shopping/cart',[CartController::class,'cart'])->name('shop.cart');
Route::post('/shopping/cart/{id}',[CartController::class,'in_cart'])->name('shop.in_cart');
Route::get('/delin_cart/{id}',[CartController::class,'del_inCart'])->name('del.in_cart'); // ลบ สินค้าในตระกร้า

// api ดึงจังหวัด
Route::get('/tambon', function () {
    $provinces = Tambon::select('province')->distinct()->get();
    $amphoes = Tambon::select('amphoe')->distinct()->get();
    $tambons = Tambon::select('tambon')->distinct()->get();
    return view("tambon/index", compact('provinces','amphoes','tambons'));
});
