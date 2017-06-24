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

// --- Risorse libere
Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@login');

// --- Risorse protetta dal middleware JWT Auth
Route::group(['middleware' => 'jwt.auth'], function () {

    Route::get('user-info', 'UserController@getAuthUser');
    Route::get('angular-demo', 'UserController@angularDemo');

    // --- Aggiunto il route API per la CRUD verso anagrafica
    Route::resource('anagrafica', 'RsAnagraficaController');

});