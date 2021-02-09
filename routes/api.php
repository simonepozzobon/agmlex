<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::get(
    'news/{slug}',
    [HomeController::class, 'get_news']
);


Route::prefix('admin')->group(
    function () {
        Route::get(
            'professionals',
            [ProfessionalController::class, 'get_professionals']
        );

        Route::post(
            'new-professional',
            [ProfessionalController::class, 'create_professional']
        );

        Route::post(
            'edit-professional',
            [ProfessionalController::class, 'edit_professional']
        );

        Route::delete(
            'professional/{id}',
            [ProfessionalController::class, 'delete_professional']
        );

        Route::prefix('news')->group(
            function () {
                Route::get(
                    '/',
                    [NewsController::class, 'get_news']
                );

                Route::get(
                    '/{id}',
                    [NewsController::class, 'get_single_news']
                );

                Route::post(
                    'check-slug',
                    [NewsController::class, 'check_slug']
                );

                Route::post(
                    'create',
                    [NewsController::class, 'create']
                );

                Route::post(
                    'edit',
                    [NewsController::class, 'edit']
                );

                Route::delete(
                    '/{id}',
                    [NewsController::class, 'delete_news']
                );
            }
        );
    }
);
