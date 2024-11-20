<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return 'Welcome, Admin!';
})->middleware('role:admin'); // Only accessible by users with the 'admin' role

Route::get('/user', function () {
    return 'Welcome, User!';
})->middleware('role:user'); // Only accessible by users with the 'user' role
