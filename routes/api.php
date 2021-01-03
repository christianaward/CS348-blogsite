<?php

use App\Unsplash;
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

Route::get('comments/{post}', 'App\Http\Controllers\CommentController@apiIndex')->name('api.comments.index');

Route::get('/unsplash', function () {
    return ((new Unsplash("zSfUUDuhlVmh5yyqp9D-0SvCAbLHM_1VBgo94Te369g", "zu5YMIeo70zW9TE1CZSLsap8y9lC9BmPXXgNBOpzOzg"))->Photo());
})->name('api.unsplash');