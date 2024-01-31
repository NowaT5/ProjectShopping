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
}
