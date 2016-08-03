<?php

use App\Message as Message;

Route::get('/', function () {
	return view('welcome');
});



Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/chat', 'ChatController@index');

Route::get('/api/messages', function () {
	return Message::all();
});

Route::post('/api/messages', function () {
	return Message::create(Request::all());
});
