<?php

Route::group(['middleware' => 'web', 'prefix' => 'managecategory', 'namespace' => 'Modules\ManageCategory\Http\Controllers'], function()
{
    Route::get('/', 'ManageCategoryController@index');
});
