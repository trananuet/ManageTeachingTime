<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Base\Http\Controllers'], function()
{
    Route::get('/login', 'Auth\LoginController@index')->name('login');
    Route::post('/login','Auth\LoginController@login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Base\Http\Controllers'], function()
{
    Route::get('/','Dashboard\DashboardController@index')->name('home')->middleware('auth');
});
