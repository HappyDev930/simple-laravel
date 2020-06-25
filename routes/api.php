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


Route::group([
    'prefix' => 'class',
    'middleware' => 'api'
], function() {
    Route::get('/list', 'GroupController@list');
    Route::get('/view/{id}', 'GroupController@getClassDetail');
    Route::post('/add', 'GroupController@save');
});


Route::group([
    'prefix' => 'student',
    'middleware' => 'api'
], function() {
    Route::get('/list', 'StudentController@list');
    Route::get('/view/{id}', 'StudentController@getStudentDetail');
    Route::post('/add', 'StudentController@save');
});