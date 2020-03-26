<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('page.main');
});
Route::get('/order', function () {
    return view('page.order');
});
Route::get('/login', function () {
    return view('page.login');
});
Route::get('/admin', function () {
    return view('page.admin');
});
