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
    public function index()
    {
        return view('admin.index');
    }
    public function user()
    {
        $user = user::all();
        return view('admin.user', compact('user'));
    }
    public function employee()
    {
        $employee = DB::table('employees')->get();
        return view('admin.employee', compact('employee'));
    }
    public function emptype()
    {
        $emtypes = DB::table('emtypes')->get();
        return view('admin.employee', compact('emtypes'));
    }

    // เพิ่มพนักงาน เวอร์ชั่นล่าสุด
    public function addemp(Request $request){

        //เช็กว่ากรอกข้อมูล
        $validator = Validator::make($request->all(),[
            'fname' => 'required|max:99',
            'lname' => 'required|max:99',
            'age' => 'required|max:99',
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'emtype_id' => 'required',
        ]);
        if($validator->fails()) //ส่งกลับ error
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else
        {
            // ส่งข้อมูลไปเก็บ
            $newemp = new Employee;
            $newemp->fname = $request->input('fname');
            $newemp->lname = $request->input('lname');
            $newemp->age = $request->input('age');
            $newemp->username = $request->input('username');
            $newemp->password = $request->input('password');
            $newemp->emtype_id = $request->input('emtype_id');
            $newemp->save();

            //แสดงข้อความจัดเก็บสำเร็จ
            return response()->json([
                'status'=>200,
                'message'=>'เพิ่มพนักงาน สำเร็จ!',
            ]);
        }

    }


    // public function newemp(Request $requst)
    // {
    //     $requst->validate([
    //         'fname' => 'required',
    //         'lname' => 'required'
    //     ]);
    //     $data = [
    //         'fname' => $request->fname,
    //         'lname' => $request->lname
    //     ];
    //     dd($data);
    //     $employee = Employee::findOrFail($id);
    //     return view('employee.edit', compact('employee'));
    // }
    public function edit($id)
    {
        $editemp = Employee::findOrFail($id);
        return view('admin.employee', compact('editemp'));
    }

    public function delemp($id)
    {
        Log::info('Deleting employee with ID: ' . $id);
        DB::table('employees')->where('id', $id)->delete();

        return redirect(view('admin.employee'));
    }
}
