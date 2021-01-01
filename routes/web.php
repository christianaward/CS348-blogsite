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

Route::get('/home', 'App\Http\Controllers\PostController@index')->name('posts.index');

Route::get('/signup', 'App\Http\Controllers\UserController@create')->name('users.create');

Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');

Route::post('/signup', 'App\Http\Controllers\UserController@store')->name('users.store');

Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');

Route::post('/login', 'App\Http\Controllers\AuthController@validateLogin')->name('auth.validate');

Route::post('/home', 'App\Http\Controllers\PostController@store')->name('posts.store')->middleware('auth');

Route::get('posts/{post}', 'App\Http\Controllers\PostController@show')->name('posts.show')->middleware('auth');

Route::post('posts', 'App\Http\Controllers\CommentController@store')->name('comments.store')->middleware('auth');

Route::get('edit/{post}', 'App\Http\Controllers\PostController@edit')->name('posts.edit')->middleware('auth');

Route::post('edit/{post}', 'App\Http\Controllers\PostController@update')->name('posts.update')->middleware('auth');