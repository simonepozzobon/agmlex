<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home($slug = null)
    {
        return view('admin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin_dashboard');
        }

        return back()->withErrors(
            [
                'message' => 'Credenziali errate'
            ]
        );
    }

    public function generate_admin()
    {
        $a = new User();
        $a->name = 'Lorenzo';
        
    }
}
