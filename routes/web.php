<?php

Auth::routes();

Route::get('/threads', 'ThreadsController@index');

Route::get('/threads/{thread}', 'ThreadsController@show');