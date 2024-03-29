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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_documents', 'Api\HomeController@documents');

Route::get('/get_documents/{doctor_convenant_id}', 'Api\HomeController@documentsForUser');

Route::get('/get_users/{role_id}', 'Api\HomeController@getUsers');