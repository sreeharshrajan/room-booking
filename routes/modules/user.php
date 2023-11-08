<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register User routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['as' => 'user.', 'namespace' => 'User'], function () {
    Auth::routes();
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/home', [UserController::class, 'index'])->name('home');
    Route::get('rooms', 'RoomController@index')->name('rooms.index');

    Route::middleware(['guest:user'])->group(function () {
        Route::get('register', 'UserController@register')->name('register');
        Route::post('store', 'UserController@storeUser')->name('register.store');

        Route::get('login', [UserController::class, 'showLoginForm'])->name('login.form');
        Route::post('logging-in', [UserController::class, 'login'])->name('login');
    });

    Route::middleware(['auth:user'])->group(function () {

        Route::get('logout', [UserController::class, 'userLogout'])->name('logout');
        Route::get('/get-available-rooms', 'RoomController@getAvailableRooms')->name('get-available-rooms');
        Route::resource('booking', 'BookingController');
    });

});




