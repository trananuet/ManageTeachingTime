<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
	Route::group(['middleware' => 'auth'],function()
    {
        Route::group(['middleware' => 'check_mod_admin'],function()
        {
            //ACCESS
            Route::group(['middleware' => 'check_manage_access'],function()
            {
                Route::get('/manage_access', 'ManageAccess\ManageAccessController@getAccess')->name('manage_access');
                Route::post('/manage_access/save', 'ManageAccess\ManageAccessController@saveAccess')->name('manage_access.save');
                Route::post('/manage_access/remove', 'ManageAccess\ManageAccessController@removeAccess')->name('manage_access.remove');
            });  

            // USER
            Route::group(['middleware' => 'check_manage_user'],function()
            {
                Route::get('/manage_users', 'ManageUsers\ManageUsersController@getUser')->name('manage_users');
                Route::post('/manage_users/save', 'ManageUsers\ManageUsersController@saveUser')->name('manage_users.save');
                Route::post('/manage_users/remove', 'ManageUsers\ManageUsersController@removeUser')->name('manage_users.remove');
            });  

            //FUNCTIONS
            Route::group(['middleware' => 'check_manage_functions'],function()
            {
                Route::get('/manage_functions', 'ManageFunctions\ManageFunctionsController@getFunction')->name('manage_functions');
                Route::post('/manage_functions/save', 'ManageFunctions\ManageFunctionsController@saveFunctions')->name('manage_functions.save');
                Route::post('/manage_functions/remove', 'ManageFunctions\ManageFunctionsController@removeFunctions')->name('manage_functions.remove');
            });


            //PERMISSION
            Route::group(['middleware' => 'check_manage_permission'],function()
            {
                Route::get('/manage_permission', 'ManagePermission\ManagePermissionController@getPermission')->name('manage_permission');
                Route::post('/manage_permission/save', 'ManagePermission\ManagePermissionController@savePermission')->name('manage_permission.save');
                Route::post('/manage_permission/remove', 'ManagePermission\ManagePermissionController@removePermission')->name('manage_permission.remove');
            });
        });  
    });
});
