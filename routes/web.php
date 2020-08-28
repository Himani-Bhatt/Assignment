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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index');

    Route::resource('candidates', 'CandidateController');
    Route::get('settings', 'SettingsController@setting');
    Route::post('settings', 'SettingsController@store');
    Route::post('change-password', 'CandidateController@change_password');
});

Route::get('submit-form', 'CandidateController@view_form');
Route::post('submit-form', 'CandidateController@post_form');
