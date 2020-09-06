<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.Home');
})->name('home');
Route::view('/actions','pages.Actions')->name('Actions');
Route::get('/register','AuthController@registerview')->name('reg');
Route::post('/register','AuthController@register');
Route::get('/sugnin','AuthController@SugnInview')->name('auth');
Route::post('/sugnin','AuthController@SugnIn');
Route::get('/logout','AuthController@logout');
