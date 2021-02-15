<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $a->email = 'l.albanese@agmlex.com';
        $a->password = Hash::make('adminAgmlex_2020');
        $a->email_verified_at = '2021-02-09 15:23:07';
        $a->save();

        $this->storage_link();
    }

    public function storage_link()
    {
        return Artisan::call('storage:link');
    }
}
