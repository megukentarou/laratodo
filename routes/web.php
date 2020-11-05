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
    return view('home');
});


// ログインしていないとリダイレクトされる
ROute::group(['prefix' => 'words', 'middleware' => 'auth'], function(){
    Route::get('index', 'WordController@index')->name('words.index');  
    Route::get('create', 'WordController@create')->name('words.create');  
    Route::post('store', 'WordController@store')->name('words.store');  
    Route::get('show/{id}', 'WordController@show')->name('words.show');  
    Route::get('edit/{id}', 'WordController@edit')->name('words.edit');
    Route::post('update/{id}', 'WordController@update')->name('words.update');  
    Route::post('destroy/{id}', 'WordController@destroy')->name('words.destroy');    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
