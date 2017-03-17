<?php

Auth::routes();

Route::get('', function () {
    return view('welcome');
});

Route::get('/threads', 'ThreadsController@index');

Route::get('/threads/{thread}', 'ThreadsController@show');

Route::post('/threads/{thread}/replies', 'RepliesController@store');