<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
	Route::group(['middleware' => 'auth'],function()
    {
        Route::get('/manage_users', 'ManageUsers\ManageUsersController@getUser')->name('manage_users');
        Route::post('/manage_users/save', 'ManageUsers\ManageUsersController@saveRoleUser')->name('manage_users.save');

        Route::get('/manage_system', 'ManageSystem\ManageSystemController@getAllRole')->name('manage_system');
        Route::post('/manage_system/save', 'ManageSystem\ManageSystemController@saveRoleFunctions')->name('manage_system.save');
    });
});
