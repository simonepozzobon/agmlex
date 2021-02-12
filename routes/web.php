<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/login',
    function () {
        return view('login');
    }
)
    ->name('login_panel');

Route::post(
    '/authenticate',
    [AdminController::class, 'authenticate']
)
    ->name('login_auth');

Route::get(
    '/admin/{slug?}',
    [AdminController::class, 'home']
)
    ->where('slug', '.*')
    ->middleware('auth')
    ->name('admin_dashboard');

Route::get(
    '/{slug}',
    [HomeController::class, 'home']
)->where('slug', '.*');
