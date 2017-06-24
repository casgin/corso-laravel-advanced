<?php

use Illuminate\Http\Request;
use Dingo\Api\Routing\Router;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@login');

// --- Risorsa protetta dal middleware e
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('user-info', 'UserController@getAuthUser');
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->get('test', function () {
        return 'It is ok';
    });



});