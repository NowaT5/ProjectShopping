<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\NewEmployeeController;

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
Route::get('/admin',[AdminController::class,'index'])->name('page');
Route::get('/user',[AdminController::class,'user'])->name('user');
Route::get('/type',[ProductController::class,'type'])->name('type');
Route::get('/product',[ProductController::class,'product'])->name('product');
Route::get('/employee',[AdminController::class,'employee'])->name('employee');
Route::get('/order',[OrderController::class,'order'])->name('order');
Route::get('/detail',[DetailOrderController::class,'detailorder'])->name('detail');
Route::get('/change/{id}',[OrderController::class,'change'])->name('change');
Route::post('/employee/newemp',[AdminController::class,'newemp'])->name('newemp');
Route::get('/employee/{id}/edit',[AdminController::class,'editemp'])->name('editemp');

// Route::get('/employee/{id}/edit', 'EmployeeController@edit')->name('employee.edit');
// Route::put('/employee/{id}', 'EmployeeController@update')->name('employee.update');


//Route Page เอาไว้แสดงหน้าของ Page เท่านั้น
Route::get('/page',[PageUserController::class,'index'])->name('Home');
