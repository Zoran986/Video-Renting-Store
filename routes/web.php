<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'videos', 'middleware' => 'auth'], function(){
    Route::get('/', 'VideoController@index')->name('videos');
    Route::get('/{id}/rent', 'VideoController@rent')->name('rentVideo');
    Route::get('/{id}/return', 'VideoController@return')->name('returnVideo');
   

});
