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
Route::get('/count', 'RankController@index_count');
Route::get('/serch/ranks_index', 'RankController@serch_index');    
Route::get('/serch/ranks_vote', 'RankController@serch_vote');
Route::get('/ranks/create', 'RankController@create')->middleware('auth');
Route::get('/ranks/user/{user}', 'RankController@index_user');
Route::get('/ranks/vote', 'RankController@vote_index')->middleware('auth');
Route::get('/ranks/vote/{rank}', 'RankController@vote_show')->middleware('auth');
Route::get('/ranks/comment/{rank}', 'RankController@create_comment')->middleware('auth');
Route::get('/ranks/comment/read/{rank}', 'RankController@read_comment');
Route::get('/ranks/{rank}/edit', 'RankController@edit');
Route::delete('/ranks/{rank}','RankController@destroy');
Route::get('/ranks/{rank}', 'RankController@show');
Route::get('/rank_user/{rank}', 'RankController@show_user');
Route::post('/ranks','RankController@store');
Route::post('/comments/{rank}','RankController@store_comment');
Route::post('/ranks/vote/{rank}/{select}','RankController@store_vote');




Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');
