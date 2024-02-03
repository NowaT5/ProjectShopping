<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Emtype;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // หน้าแดชบอร์ด
    public function index()
    {
        return view('admin.index');
    }
    // แสดงรายชื่อลูกค้า
    public function user()
    {
        $user = user::all();
        return view('admin.user', compact('user'));
    }
    // แสดงรายชื่อพนักงาน
    public function employee()
    {
        $employee = DB::table('employees')->get();
        return view('admin.employee', compact('employee'));
    }
    // ดึงข้อมูลตำแหน่งพนักงาน
    public function emptype()
    {
        $emtypes = DB::table('emtypes')->get();
        return view('admin.employee', compact('emtypes'));
    }

    // ปรับปรุงรายชื่อพนักงาน
    // public function edit($id)
    // {
    //     $editemp = Employee::findOrFail($id);
    //     return view('admin.employee', compact('editemp'));
   // }

     // ลบพนักงาน
     public function delemp($id){
        Employee::find($id)->delete();
        return redirect()->back();
    }

    // อับเดตข้อมูลพนักงาน
    public function editemp(Request $request,$id) {
     // // เช็กว่ากรอกข้อมูล
        // $request->validate([
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'age' => 'required',
        //     'phone' => 'required',
        //     'username' => 'required',
        //     'password' => 'required',
        //     'emtype_id' => 'required'
        // ]);

        // $employee = DB::table('employees')->where('id', $request->$id);
        $employee = Employee::find($id);
        // DB::table('employees')->where('id',$id);
        // $newemp = [
            $employee->id  = $request->id;
            $employee->fname = $request->fname;
            $employee->lname = $request->lname;
            $employee->age = $request->age;
            $employee->gender = $request->gender;
            $employee->phone = $request->phone;
            $employee->username = $request->username;
            $employee->password = $request->password;
            $employee->emtype_id = $request->emtype_id;
            $employee->save();
        //   'lname' => $request->lname,
        //   'age' => $request->age,
        //    'gender' => $request->gender,
        //   'phone' => $request->phone,
        //   'username' => $request->username,
        //   'password' => $request->password,
        //   'emtype_id' => $request->emtype_id,
        // ];

        // dd($newemp);

        // บันทึกการแก้ไขข้อมูลลง DB
        // Employee::find($id)->save($newemp);
        // Employee::find($id)->update($newemp);
        // DB::table('employees')->where('id',$id)->update($newemp); // kongกาก

        // dd($newemp);
        return redirect('/employee');
    }

}
