<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home($slug = null)
    {
        return view('admin');
    }
}
