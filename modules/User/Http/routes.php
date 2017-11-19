<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
	Route::group(['middleware' => 'auth'],function()
    {
        Route::get('/manage_users', 'ManageUsers\ManageUsersController@index')->name('manage_users');

    });
    Route::get('/', 'UserController@index');
});
