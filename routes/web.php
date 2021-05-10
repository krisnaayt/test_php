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

use App\Http\Controllers\BerkasPerkaraController;

Route::get('/','AuthController@login');
Route::get('/test', 'SuratPanjarController@test');

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
        });
        Route::prefix('suratReport')->group(function(){
            Route::get('/', 'SuratReportController@index');
            Route::get('/export', 'SuratReportController@export');
        });

        Route::prefix('berkasPerkara')->group(function(){
            Route::get('/', 'BerkasPerkaraController@index');
            Route::get('/get', 'BerkasPerkaraController@get');
            Route::get('/add', 'BerkasPerkaraController@add');
            Route::post('/store', 'BerkasPerkaraController@store');
            Route::get('/getJenisPerkara', 'BerkasPerkaraController@getJenisPerkara');
            Route::get('/detail/{id}', 'BerkasPerkaraController@detail');
            Route::get('/edit/{id}', 'BerkasPerkaraController@edit');
            Route::post('/getBerkasPerkara', 'BerkasPerkaraController@getBerkasPerkara');
            Route::post('/update', 'BerkasPerkaraController@update');
            Route::get('/review/{id}', 'BerkasPerkaraController@review');
            Route::post('/storeReview', 'BerkasPerkaraController@storeReview');
            Route::get('/setBht/{id}', 'BerkasPerkaraController@setBht');
            Route::post('/storeSetBht', 'BerkasPerkaraController@storeSetBht');

        });
    });
});
