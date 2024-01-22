<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('loginUser.index');
    }
    public function register()
    {
        return view('loginUser.register');
    }
}
