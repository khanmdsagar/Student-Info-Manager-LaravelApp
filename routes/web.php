<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', 'mainController@home')->middleware('checkLogin');
Route::get('/search', 'mainController@search')->middleware('checkLogin');

//profile photo handler
Route::post('/profilePhotoFileHandler', 'mainController@profilePhotoFileHandler')->middleware('checkLogin');


Route::get('/insertPage', 'mainController@insertPage')->middleware('checkLogin');
Route::post('/insertData', 'mainController@insertData')->middleware('checkLogin');


Route::get('/editPage/{id}', 'mainController@editPage')->middleware('checkLogin');
Route::post('/editData/{id}', 'mainController@editData')->middleware('checkLogin');


Route::get('/deleteData/{id}', 'mainController@deleteData')->middleware('checkLogin');


Route::get('/', 'loginController@login');
Route::get('/logout', 'loginController@logout')->middleware('checkLogin');
Route::get('/loginCallback', 'loginController@loginCallback');
Route::get('/callGithub', 'loginController@callGithub');
