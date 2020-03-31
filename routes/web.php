<?php

use Illuminate\Support\Facades\Route;




Route::get('/login', function () {
    return view('page.login');
})->name('login');

Route::get('/','MainController@index');

Route::post('/createNewDish','MainController@addDish');

Route::post('/createOrder','MainController@createOrder');

Route::post('/submitOrder','MainController@submitOrder');

Route::get('/admin','MainController@admin');

Route::post('/remove-dish','MainController@removeDish');

Route::post('/editDish','MainController@editDish');

Route::post('/search','MainController@searchDish');

Route::post('/auth','MainController@auth')->name('auth');
