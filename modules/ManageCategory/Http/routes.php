<?php

Route::group(['middleware' => 'web',
            'prefix' => 'managecategory',
            'namespace' => 'Modules\ManageCategory\Http\Controllers'], function()
{
    Route::get('/school_year', 'SchoolYear\SchoolYearController@getSchoolYear')->name('school_year');
});
