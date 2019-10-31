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

/** UF */
Route::get('uf', 'UfController@index')->name('api.uf.index');
Route::get('uf/{uf}', 'UfController@show')->name('api.uf.show');
Route::post('uf', 'UfController@store')->name('api.uf.store');
Route::put('uf/{uf}', 'UfController@update')->name('api.uf.update');
Route::delete('uf/{uf}', 'UfController@destroy')->name('api.uf.destroy');

/** NOT FOUND */
Route::fallback(function(){
  return response()->json(['error' => 'Method Not Found'], 404);
})->name('api.fallback.404');
