<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageUserController extends Controller
{
    public function index()
    {
        return view('user.page');
    }
}
