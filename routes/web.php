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

//Route ส่วนของ admin ทั้งหมด
Route::get('/admin',[AdminController::class,'index'])->name('page'); //หน้าแดชบอรืด
Route::get('/user',[AdminController::class,'user'])->name('user'); // รายชื่อลูกค้า
Route::get('/type',[ProductController::class,'type'])->name('type'); //รายชื่อชนิดสินค้า
//Route::get('/category',[ProductController::class,'category'])->name('category'); // รายชื่อประเภทสินค้า
Route::get('/product',[ProductController::class,'product'])->name('product'); //แสดงรายการสินค้า
Route::get('/employee',[AdminController::class,'employee'])->name('employee'); // แสดงรายชื่อพนักงาน
Route::get('/newemp',[NewEmployeeController::class,'newemp']); // หน้ากรอกข้อมูล
Route::post('/addemp',[NewEmployeeController::class,'addemp']); // ปุ่มบันทึก

Route::get('/employee/delete/{id}',[AdminController::class,'delemp'])->name('employee.delemp'); // ฟังชั่นลบ
// Route::get('/editemployee/{id}',[AdminController::class,'edit'])->name('employee.edit'); // หน้าปรับปรุงข้อมูล
// Route::get('/editemployee/{id}',[AdminController::class,'edit'])->name('employee.edit'); // ปุ่ม Edit

Route::get('/order',[OrderController::class,'order'])->name('order');
Route::get('/detail',[DetailOrderController::class,'detailorder'])->name('detail');
Route::get('/change/{id}',[OrderController::class,'change'])->name('change');

// Route::get('/delemp/{id}',[AdminController::class,'delemp'])->name('delemp');
// Route::get('/employee/{id}/edit', 'EmployeeController@edit')->name('employee.edit');
// Route::put('/employee/{id}', 'EmployeeController@update')->name('employee.update');


//Route Page เอาไว้แสดงหน้าของ Page เท่านั้น
Route::get('/page',[PageUserController::class,'index'])->name('Home');
Route::get('/about',[PageUserController::class,'about'])->name('About');
Route::get('/portfolio',[PageUserController::class,'portfolio'])->name('Portfolio');
Route::get('/portfoliodetails',[PageUserController::class,'portfoliodetails'])->name('Portfoliodetails');
