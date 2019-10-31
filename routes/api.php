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

// Cadastro e login
Route::post('login','LoginController@login')->name('api.login.login');
Route::post('user','UserController@store')->name('api.user.store');

Route::group(['middleware' => 'auth.jwt'], function () {

    // Logout
    Route::get('logout', 'LoginController@logout')->name('api.login.logout');

    // UF
    Route::get('uf', 'UfController@index')->name('api.uf.index');
    Route::get('uf/{uf}', 'UfController@show')->name('api.uf.show');
    Route::post('uf', 'UfController@store')->name('api.uf.store');
    Route::put('uf/{uf}', 'UfController@update')->name('api.uf.update');
    Route::delete('uf/{uf}', 'UfController@destroy')->name('api.uf.destroy');

});

// Not found
Route::fallback(function(){
    return response()->json(['error' => 'Method Not Found'], 404);
})->name('api.fallback.404');
