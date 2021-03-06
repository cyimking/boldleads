<?php

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

/**
 * Home Route
 */
Route::get('/', 'LeadsController@create')->name('home');

/**
 * Authentication Routes
 */
Auth::routes();

/**
 * Lead Routes
 */
Route::resource('leads', 'LeadsController');