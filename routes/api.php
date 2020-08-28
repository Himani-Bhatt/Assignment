<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace ('Api')->middleware(['throttle'])->group(function () {
    Route::post('search-records', 'ApiController@search_candidate');
    Route::post('submit-form', 'ApiController@submit_form');
    Route::post('add-note', 'ApiController@store_note');
    Route::post('edit-note', 'ApiController@update_note');
    Route::get('notes', 'ApiController@notes');
    Route::get('candidates', 'ApiController@candidates');
    Route::get('candidate-logs', 'ApiController@candidatelogs');
    Route::post('delete-candidate', 'ApiController@delete_candidate');
    Route::post('delete-note', 'ApiController@delete_note');
});
