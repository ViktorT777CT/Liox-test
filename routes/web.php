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
    return redirect('/home');
});

//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home.index');

//Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');




Route::group(['middleware' => 'admin'], function () {
    Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
});
Route::post('/home', 'App\Http\Controllers\HomeController@store')->name('home.store');



Auth::routes();

Route::group(['middleware' => 'user'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

