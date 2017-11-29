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
        Route::post('/manage_system/save', 'ManageSystem\ManageSystemController@saveRole')->name('manage_system.save');
        Route::post('/manage_system/remove', 'ManageSystem\ManageFunctionsController@removeRole')->name('manage_system.remove');

        Route::get('/manage_functions', 'ManageFunctions\ManageFunctionsController@getAllFunction')->name('manage_functions');
        Route::post('/manage_functions/save', 'ManageFunctions\ManageFunctionsController@saveFunctions')->name('manage_functions.save');
        Route::post('/manage_functions/remove', 'ManageFunctions\ManageFunctionsController@removeFunctions')->name('manage_functions.remove');

        Route::get('/manage_permission', 'ManagePermission\ManagePermissionController@permission')->name('manage_permission');
    });
});
