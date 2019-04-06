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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/checkRedditFIle', 'SubredditDataController@checkRedditFIle');
Route::get('/getRedditFIle', 'SubredditDataController@getRedditFIle');
Route::get('/fileToDB', 'SubredditDataController@fileToDB');

Route::get('/showSubreddit', 'SubredditController@showSubreddit');
Route::get('/showSubredditPost/{any}', 'SubredditPostController@showSubredditPost');