<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/admin/add-cinema', 'App\Http\Controllers\Admin\CinemaController@addCinemaAPI');
Route::get('/admin/edit-cinema', 'App\Http\Controllers\Admin\CinemaController@editCinemaAPI');
Route::get('/admin/delete-cinema', 'App\Http\Controllers\Admin\CinemaController@deleteCinemaAPI');

// Guest API
Route::post('/edit-information-account', 'App\Http\Controllers\Guest\GuestAccountController@editAccount');

