<?php

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
Route::get('/', 'RankController@index');
Route::get('/ranks/create', 'RankController@create');
Route::get('/ranks/vote', 'RankController@vote_index');
Route::get('/ranks/vote/{rank}', 'RankController@vote_show');
Route::get('/ranks/{rank}/edit', 'RankController@edit');
Route::put('/ranks/{rank}', 'RankController@update');
Route::delete('/ranks/{rank}','RankController@destroy');
Route::get('/ranks/{rank}', 'RankController@show');
Route::post('/ranks','RankController@store');
Route::post('/ranks/vote','RankController@store_vote');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
