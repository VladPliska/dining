<?php

use Illuminate\Support\Facades\Route;




Route::get('/login', function () {
    return view('page.login');
});

Route::get('/','MainController@index');

Route::post('/createNewDish','MainController@addDish');

Route::post('/createOrder','MainController@createOrder');

Route::post('/submitOrder','MainController@submitOrder');

Route::get('/admin','MainController@admin');

Route::post('/remove-dish','MainController@removeDish');

Route::post('/editDish','MainController@editDish');
