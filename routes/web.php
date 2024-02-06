<?php

use Illuminate\Support\Facades\Route;

// back
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\NewEmployeeController;
use App\Http\Controllers\EmployeeController;


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

Route::get('/admin',[AdminController::class,'index'])->name('page'); //หน้าแดชบอร์ด

//Route User
Route::get('/user',[AdminController::class,'user'])->name('user'); // รายชื่อลูกค้า

// Employee
Route::get('/employee',[AdminController::class,'employee'])->name('employee'); // แสดงรายชื่อพนักงาน
Route::get('/newemp',[NewEmployeeController::class,'newemp']); // หน้ากรอกข้อมูล
Route::post('/addemp',[NewEmployeeController::class,'addemp']); // ปุ่มบันทึก
Route::get('/employee/delete/{id}',[AdminController::class,'delemp'])->name('employee.delemp'); // ฟังชั่นลบ
// Route::get('/editemployee/{id}',[AdminController::class,'edit'])->name('employee.edit'); // หน้าปรับปรุงข้อมูล
Route::post('/editemp/{id}',[AdminController::class,'editemp'])->name('employee.edit'); // ปุ่ม Edit

// type route
Route::get('/type',[ProductController::class,'type'])->name('type'); // หน้าชนิดสินค้า
Route::post('/addtype',[ProductController::class,'addtype']); // ปุ่มบันทึก
Route::post('/edittype/{id}',[ProductController::class,'edittype'])->name('type.edit'); // ปุ่มบันทึกแก้ไข
Route::get('/deltype/{id}',[ProductController::class,'deltype'])->name('deltype'); // ปุ่มลบ

// Category route
Route::get('/producttype',[ProductController::class,'product_type'])->name('producttype'); // หน้าประเภทสินค้า
Route::post('/addproducttype',[ProductController::class,'add_product_type'])->name('addproducttype'); // ปุ่มบันทึก
Route::post('/editproducttype/{id}',[ProductController::class,'edit_product_type'])->name('editproducttype.edit'); // ปุ่มบันทึกแก้ไข
Route::get('/delproducttype/{id}',[ProductController::class,'del_product_type'])->name('del.producttype'); // ปุ่มลบ

// product detail route
Route::get('/product',[ProductController::class,'product'])->name('product'); //แสดงรายการสินค้า
Route::get('/delproduct/{id}',[ProductController::class,'del_product'])->name('del.product'); // ปุ่มลบ

// Route Order
Route::get('/order',[OrderController::class,'order'])->name('order');
Route::get('/detail',[DetailOrderController::class,'detailorder'])->name('detail');
Route::get('/change/{id}',[OrderController::class,'change'])->name('change');

//Route Page เอาไว้แสดงหน้าของ Page เท่านั้น
Route::get('/page',[PageUserController::class,'index'])->name('Home');
Route::get('/about',[PageUserController::class,'about'])->name('About');
Route::get('/portfolio',[PageUserController::class,'portfolio'])->name('Portfolio');
Route::get('/portfoliodetails',[PageUserController::class,'portfoliodetails'])->name('Portfoliodetails');
