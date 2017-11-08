<?php

Route::group(['middleware' => 'web',
            'prefix' => 'managecategory',
            'namespace' => 'Modules\ManageCategory\Http\Controllers'], function()
{
    Route::group(['middleware' => 'auth'],function()
    {
        Route::get('/school_year', 'SchoolYear\SchoolYearController@getSchoolYear')->name('school_year');
        Route::post('/create/school_year/', 'SchoolYear\SchoolYearController@createSchoolYear')->name('school_year.save');
        Route::post('/remove/school_year/', 'SchoolYear\SchoolYearController@delSchoolYear')->name('school_year.remove');
    });
});
