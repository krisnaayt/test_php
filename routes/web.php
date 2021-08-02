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
    return redirect('productItem');
});

Route::prefix('productItem')->group(function(){
    Route::get('/','ProductItemController@index');
    Route::get('/storeItemFromApi','ProductItemController@storeItemFromApi');
    Route::post('/get','ProductItemController@get');
    Route::get('/add','ProductItemController@add');
    Route::post('/store','ProductItemController@store');
    Route::get('/delete/{id}','ProductItemController@delete');
    Route::get('/edit/{id}','ProductItemController@edit');
    Route::post('/update','ProductItemController@update');
    Route::get('/storeItemFromApi','ProductItemController@storeItemFromApi');
    Route::get('/export', 'ProductItemController@export');
});
