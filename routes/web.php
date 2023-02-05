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
    return view('/auth/login');
});

Route::resource('posts' , 'App\Http\Controllers\PostController');
Route::resource('comments' , 'App\Http\Controllers\CommentController');
Route::get('/posts/{all}' , 'App\Http\Controllers\PostController@index')->name('index');
Route::put('/posts/update/{id}' , 'App\Http\Controllers\PostController@update')->name('posts.update');
Route::get('/posts/hardDelete/{id}' , 'App\Http\Controllers\PostController@hardDelete')->name('posts.hardDelete');
Route::get('/posts/show/{id}' , 'App\Http\Controllers\PostController@show')->name('post.show');

Route::get('/posts/share/{id}' , 'App\Http\Controllers\PostController@share')->name('posts.share');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
