<?php

Route::group(['middleware' => 'web',
            'prefix' => 'managecategory',
            'namespace' => 'Modules\ManageCategory\Http\Controllers'], function()
{
    Route::group(['middleware' => 'auth'],function()
    {
        Route::get('/school_year', 'SchoolYear\SchoolYearController@getSchoolYear')->name('school_year');
        Route::post('/school_year/save', 'SchoolYear\SchoolYearController@createEditSchoolYear')->name('school_year.save');
        Route::post('/school_year/remove', 'SchoolYear\SchoolYearController@delSchoolYear')->name('school_year.remove');
        Route::get('/semester', 'Semester\SemesterController@getSemester')->name('semester');
        Route::post('/semester/save', 'Semester\SemesterController@createEditSemester')->name('semester.save');
        Route::post('/semester/remove', 'Semester\SemesterController@delSemester')->name('semester.remove');
    });
});
