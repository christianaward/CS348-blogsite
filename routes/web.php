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

Route::get('/home', 'App\Http\Controllers\PostController@index');

Route::get('/signup', 'App\Http\Controllers\UserController@create')->name('users.create');

Route::get('/login', 'App\Http\Controllers\UserController@login')->name('users.login');

Route::post('/home', 'App\Http\Controllers\UserController@store')->name('users.store');