<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewEmployeeController extends Controller
{
    public function newemp(){
        
        return view('admin.newemployee');
    }
}
