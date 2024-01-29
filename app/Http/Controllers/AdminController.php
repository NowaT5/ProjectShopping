<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Emtype;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function newemp(Request $requst)
    {
        $requst->validate([
            'fname' => 'required',
            'lname' => 'required'
        ]);
        $data = [
            'fname' => $request->fname,
            'lname' => $request->lname
        ];
        dd($data);
        // $employee = Employee::findOrFail($id);
        // return view('employee.edit', compact('employee'));
    }
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
