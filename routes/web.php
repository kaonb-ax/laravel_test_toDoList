<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
//===GET================
Route::get('/', function () {
    return view('welcome');
});
Route::get('/task', 'TaskController@index' );
Route::get('/task/{id}/show', 'TaskController@show');
Route::get('/{id}/update', 'TaskController@update');
Route::get('/{id}/delete', 'TaskController@fastDelete');
route::get('/react', function () {
    return view('react');
});
//===POST==============
Route::post('/save', 'TaskController@save');
Route::post('/edit', 'TaskController@edit');
Route::post('/delete', 'TaskController@delete');
