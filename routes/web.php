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

Route::get('/',function () {
    return redirect('admin');
});

Route::group(['middleware' => ['ladmin']], function(){
    Route::resource('admin','AdminController');
    Route::post('admin/deladmin', 'AdminController@del');
    Route::get('del/admin', 'AdminController@del');

    Route::resource('registrant','RegistrantController');
    Route::get('/txt','RegistrantController@txt');
    Route::post('registrant/del', 'RegistrantController@del');
    Route::get('del/registrant', 'RegistrantController@del');
});

//Auth
Route::group(['middleware' => ['admin']], function(){
    Route::get('/login', 'AuthController@getLogin');
    Route::post('/login', 'AuthController@postLogin');
});
Route::get('/logout', 'AuthController@getLogout');
