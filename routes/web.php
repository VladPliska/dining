<?php

use Illuminate\Support\Facades\Route;




Route::get('/login', function () {
    return view('page.login');
});
Route::get('/admin', function () {
    return view('page.admin');
});
Route::get('/','MainController@index');

Route::post('/createNewDish','MainController@addDish');

Route::post('/createOrder','MainController@createOrder');
