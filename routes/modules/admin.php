<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;

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

    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/login', 'AdminController@showLoginForm')->name('login-form');
        Route::post('/confirm-login', 'AdminController@login')->name('login');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', 'AdminController@index')->name('dashboard');
        Route::get('/logout', 'AdminController@logout')->name('logout');

        Route::resource('rooms', 'RoomController');

        Route::resource('booking', 'BookingController');

        Route::resource('user', 'UserController');
    });

});

