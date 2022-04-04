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

Route::get('/', 'App\Http\Controllers\MainController@main')
->name('home');

Route::get('lang/{lang}', 'App\Http\Controllers\LanguageController@switchLang')
->name('switchLang');

Route::middleware(['throttle:login'])->group(function () {
    Route::post('login', 'App\Http\Controllers\Auth\LoginController@auth')
    ->name('auth');
    Route::get('get-login', 'App\Http\Controllers\Auth\LoginController@get_login')
    ->name('get-login');
    Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')
    ->name('logout');
});

Route::post('/my_profile', 'App\Http\Controllers\ProfileController@change')
->name('my_profile');

Route::post('/search_settings', 'App\Http\Controllers\ProfileController@searchSettings')
->name('my_search');
