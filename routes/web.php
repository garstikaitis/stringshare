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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth-callback', 'SpotifyController@handleProviderCallback');

Route::group(['prefix' => '/api'], function() {
    Route::post('/login', 'AuthController@authenticateWithEmailAndPassword');
    Route::post('/login/token', 'AuthController@authenticateWithToken')->name('loginWithToken');
    Route::get('/login-with-spotify', 'SpotifyController@redirectToProvider');
    Route::group(['prefix' => 'venues'], function() {
        Route::get('/', 'VenueController@index');
    });
    Route::group(['prefix' => 'bands'], function() {
        Route::get('/', 'BandController@index');
    });
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', 'UserController@index');
        Route::get('/{id}', 'UserController@getUser');
    });
    Route::group(['prefix' => 'proposals'], function() {
        Route::get('/', 'ProposalController@index');
        Route::post('/', 'ProposalController@createProposal');
    });
    Route::group(['prefix' => 'songs'], function() {
        Route::get('/{band_slug}', 'SongController@index');
    });
    Route::group(['prefix' => 'enums'], function() {
        Route::get('/genres', 'GenreController@index');
    });
});