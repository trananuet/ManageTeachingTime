<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
	Route::group(['middleware' => 'auth'],function()
    {
        Route::get('/manage_users', 'ManageUsers\ManageUsersController@getUser')->name('manage_users');
        Route::post('/manage_users/save/{userID}', 'ManageUsers\ManageUsersController@saveRoleUser')->name('manage_users.save');
        Route::post('/manage_users/addUser', 'ManageUsers\ManageUsersController@addUser')->name('manage_users.add');
        Route::post('/manage_users/deleteUser/{userID}', 'ManageUsers\ManageUsersController@deleteUser')->name('manage_users.delete');
        Route::post('/manage_users/edit/{userID}', 'ManageUsers\ManageUsersController@deleteUser')->name('manage_users.edit');


        Route::get('/manage_system', 'ManageSystem\ManageSystemController@getAllRole')->name('manage_system');
        Route::post('/manage_system/save', 'ManageSystem\ManageSystemController@saveRoleFunctions')->name('manage_system.save');
    });
});
