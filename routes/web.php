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

Route::prefix('auth')->group(function(){
    Route::get('/','AuthController@login');
    Route::post('/doLogin','AuthController@doLogin');
});

Route::group(['middleware' => ['authenticate']], function(){
    Route::get('/doLogout','AuthController@doLogout');

    Route::middleware('permission')->group(function(){
        Route::prefix('suratPanjar')->group(function(){
            Route::get('/', 'SuratPanjarController@index');
            Route::get('/get', 'SuratPanjarController@get');
            Route::get('/add', 'SuratPanjarController@add');
            Route::post('/store', 'SuratPanjarController@store');
            Route::get('/edit/{id}', 'SuratPanjarController@edit');
            Route::post('/update', 'SuratPanjarController@update');
            Route::get('/delete/{id}', 'SuratPanjarController@delete');
            Route::get('/preview/{preview}', 'SuratPanjarController@preview');
            Route::get('/test', 'SuratPanjarController@test');
        });
    });
});
