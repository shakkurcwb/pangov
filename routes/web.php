<?php

# Landing Page
Route::get('/', function () { return view('welcome'); });

# Auth
Auth::routes();

# Pages
Route::get('/dashboard', 'PageController@dashboard');
// Route::get('/profile', 'PageController@profile');
// Route::get('/settings', 'PageController@settings');
Route::get('/help', 'PageController@help');
// Route::get('/feedback', 'PageController@feedback');

# Contacts
Route::get('/contacts', 'ContactController@index');
Route::post('/contacts/search', 'ContactController@search');
Route::get('/contacts/new', 'ContactController@create');
Route::post('/contacts', 'ContactController@store');
Route::get('/contacts/{id}', 'ContactController@show');
Route::get('/contacts/{id}/edit', 'ContactController@edit');
Route::patch('/contacts/{id}', 'ContactController@update');
Route::delete('/contacts/{id}', 'ContactController@destroy');

Route::get('/contacts/{id}/add', 'ContactController@clone');
Route::get('/contacts/{id}/favorite', 'ContactController@favorite');

# Events
Route::get('/events', 'EventController@index');
Route::post('/events/search', 'EventController@search');
Route::get('/events/new', 'EventController@create');
Route::post('/events', 'EventController@store');
Route::get('/events/{id}', 'EventController@show');
Route::get('/events/{id}/edit', 'EventController@edit');
Route::patch('/events/{id}', 'EventController@update');
Route::delete('/events/{id}', 'EventController@destroy');

Route::get('/events/{id}/join', 'EventController@join');

# Users
Route::get('/users', 'UserController@index');
/*
Route::post('/users/search', 'ContactController@search');
Route::get('/users/new', 'ContactController@create');
Route::post('/users', 'ContactController@store');
Route::get('/users/{id}', 'ContactController@show');
Route::get('/users/{id}/edit', 'ContactController@edit');
Route::patch('/users/{id}', 'ContactController@update');
Route::delete('/users/{id}', 'ContactController@destroy');

Route::get('/users/{id}/follow', 'ContactController@follow');
*/