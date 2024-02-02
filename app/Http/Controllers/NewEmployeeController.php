<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Emtype;

use Illuminate\Http\Request;

class NewEmployeeController extends Controller
{
    public function newemp(){

        return view('admin.newemployee');
    }
    // public function addemp(Request $request){

    //     // ตรวจสอบข้อมูลที่ส่งมาจากฟอร์ม
    //     $request->validate([
    //         'fname'=>'required',
    //         'lname'=>'required',
    //         'phone'=>'required',
    //         'emtype_id'=>'required'
    //     ]);

    // }

    public function addemp(Request $request)
    {
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

        // บันทึกข้อมูลลง DB
            $newemp = new Employee;
            $newemp->fname = $request->input('fname');
            $newemp->lname = $request->input('lname');
            $newemp->age = $request->input('age');
            $newemp->gender = $request->input('gender');
            $newemp->phone = $request->input('phone');
            $newemp->username = $request->input('username');
            $newemp->password = $request->input('password');
            $newemp->emtype_id = $request->input('emtype_id');
            $newemp->save();

            return redirect('/employee');

        // $data=[
        //     'fname' => $request->fname,
        //     'lname' => $request->lname,
        //     'age' => $request->age,
        //     'gender' =>$request->gender,
        //     'phone' =>$request->phone,
        //     'username' => $request->username,
        //     'password' => $request->password,
        //     'emtype_id' => $request->emtype_id,
        // ];
        //  Employee::insert($data);
        //  return redirect('/employee');

        // if($validator->fails()) //ส่งกลับ error
        // {
        //     return response()->json([
        //         'status'=>400,
        //         'errors'=>$validator->messages(),
        //     ]);
        // }
        // else
        // {
        //     // ส่งข้อมูลไปเก็บ
        //     $newemp = new Employee;
        //     $newemp->fname = $request->input('fname');
        //     $newemp->lname = $request->input('lname');
        //     $newemp->age = $request->input('age');
        //     $newemp->phone = $request->input('phone');
        //     $newemp->username = $request->input('username');
        //     $newemp->password = $request->input('password');
        //     $newemp->emtype_id = $request->input('emtype_id');
        //     $newemp->save();

        //     //แสดงข้อความจัดเก็บสำเร็จ
        //     return response()->json([
        //         'status'=>200,
        //         'message'=>'เพิ่มพนักงาน สำเร็จ!',
        //     ]);
        // }
    }
}
