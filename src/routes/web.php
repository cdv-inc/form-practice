<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form1', function () {
    return view('form1');
});
Route::get('/form2', function () {
    return view('form2');
});

Route::get('/form3', function () {
    return view('form3');
});

Route::get('/test', function () {
    return view('test');
});