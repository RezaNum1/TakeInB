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
    return redirect()->route('Base.index_home');
});
Route::get('/login', 'AuthenticationController@login')->name('auth.login');
Route::post('/loginProcess', 'AuthenticationController@loginProcess')->name('auth.loginProcess');
Route::get('/logout', 'AuthenticationController@logout')->name('auth.logout');

Route::get('/register_takers', 'AuthenticationController@register_takers')->name('auth.register_takers');
Route::post('/register_takersPro', 'AuthenticationController@register_takersPro')->name('auth.register_takersPro');

Route::get('/register_owner', 'AuthenticationController@register_owner')->name('auth.register_owner');
Route::post('register_ownerPro', 'AuthenticationController@register_ownerPro')->name('auth.register_ownerPro');

Route::get('/home', 'BasePageController@index_home')->name('Base.index_home');
Route::get('/checkin/{id}', 'BasePageController@checkin')->name('Base.checkin');
Route::get('/search', 'BasePageController@search')->name('Base.search');


Route::group(['middleware' => 'auth.login'], function (){

    Route::group(['prefix' => 'takers'], function (){
        Route::get('/', 'TakersController@index')->name('takers.index');
        Route::get('/checkin/{id}', 'TakersController@checkin')->name('takers.checkin');
        Route::post('/bookingPro', 'TakersController@bookingPro')->name('takers.booking');
        Route::get('/bookingreq', 'TakersController@bookingreq')->name('takers.bookingreq');
    });

    Route::group(['prefix' => 'owners'], function (){
        Route::get('/', 'BuildingOwnerController@index')->name('owners.index');
        Route::get('/create', 'BuildingOwnerController@create')->name('owners.create');
        Route::post('/store', 'BuildingOwnerController@store')->name('owners.store');
        Route::get('/edit/{id}', 'BuildingOwnerController@edit')->name('owners.edit');
        Route::post('/update/{id}', 'BuildingOwnerController@update')->name('owners.update');
        Route::get('/detail/{id}', 'BuildingOwnerController@detail')->name('owners.detail');
        Route::get('/status/{id}', 'BuildingOwnerController@status')->name('owners.status');
        Route::get('/delete/{id}', 'BuildingOwnerController@delete')->name('owners.delete');
        Route::post('/restore', 'BuildingOwnerController@restore')->name('owners.restore');
        Route::get('/bookingList', 'BuildingOwnerController@bookingList')->name('owners.bookingList');
        Route::get('/statusBooking/{id}', 'BuildingOwnerController@statusBooking')->name('owners.statusBooking');
    });


});

