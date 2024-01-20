<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function user(){
        $user = user::all();
        return view('admin.user',compact('user'));
    }
    public function employee(){
        $employee = employee::all();
        return view('admin.employee',compact('employee'));
    }
}
