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

Route::get('android/listmember/{id_pelatih}', 'Android\AndroidController@anggota');
Route::get('android/listmember/', 'Android\AndroidController@maxIDPelatihan');
Route::post('android/listmember/', 'Android\AndroidController@inputnilai');
Route::post('android/login', 'Android\AndroidController@login');
