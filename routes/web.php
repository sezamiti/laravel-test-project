<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts', 'App\Http\Controllers\PostController@index');
Route::get('/posts/create', 'App\Http\Controllers\PostController@create')->name('post.create');

Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show')->name('post.show');
Route::get('/posts/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::patch('/posts/{post}', 'App\Http\Controllers\PostController@update')->name('post.update');
Route::delete('/posts/{post}', 'App\Http\Controllers\PostController@destroy')->name('post.delete');


Route::get('/posts/update', 'App\Http\Controllers\PostController@update');
Route::get('/posts/delete', 'App\Http\Controllers\PostController@delete');
Route::get('/posts/firstOrCreate', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/updateOrCreate', 'App\Http\Controllers\PostController@updateOrCreate');

Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/contacts', 'App\Http\Controllers\ContactsController@index')->name('contact.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');
Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('post.index');

