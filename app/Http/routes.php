<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/panel/settings', 'SettingsController@index');
Route::get('/panel/settings/edit/{id}', 'SettingsController@edit');
Route::post('/panel/settings/edit/{id}', 'SettingsController@edit');

Route::get('/panel/rounds-settings', 'RoundsSettingsController@index');
Route::get('/panel/rounds-settings/edit/{eventid}', 'RoundsSettingsController@index');

Route::get('/panel/rounds-settings/edit/{eventid}/{id}', 'RoundsSettingsController@edit');
Route::post('/panel/rounds-settings/edit/{eventid}/{id}', 'RoundsSettingsController@edit');
