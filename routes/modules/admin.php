<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Auth::routes(['register' => false]);
    Route::get('/login', 'AdminController@showLoginForm');
    Route::post('/confirm-login', 'AdminController@login')->name('login');

    Route::get('/', 'AdminController@showDashboard')->name('dashboard')->middleware('auth:admin');
    Route::post('/logout', 'AdminController@logout')->name('logout')->middleware('auth:admin');
});

