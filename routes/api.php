<?php

use Illuminate\Http\Request;

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
    '/user', function (Request $request) {
        return $request->user();
    }
);


Route::prefix('admin')->group(
    function () {
        Route::get('professionals', 'ProfessionalController@get_professionals');
        Route::post('new-professional', 'ProfessionalController@create_professional');
        Route::post('edit-professional', 'ProfessionalController@edit_professional');
        Route::delete('professional/{id}', 'ProfessionalController@delete_professional');
    }
);
