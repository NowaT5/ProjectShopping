<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageUserController extends Controller
{
    public function index()
    {
        return view('user.page');
    }
    public function about()
    {
        return view('user.about');
    }
    public function portfolio()
    {
        return view('user.portfolio');
    }
    public function portfoliodetails()
    {
        return view('user.portfoliodetails');
    }
}
