<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::resource('threads', 'ThreadsController');

Route::post('/threads/{thread}/replies', 'RepliesController@store');