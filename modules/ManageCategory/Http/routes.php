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
        Route::post('/school_year/filter_active', 'SchoolYear\SchoolYearController@filterActive')->name('school_year.filterActive');
        Route::post('/school_year/import', 'SchoolYear\SchoolYearController@postImport')->name('school_year.import');

        
        Route::get('/semester', 'Semester\SemesterController@getSemester')->name('semester')->middleware('check-mod-admin');
        Route::post('/semester/save', 'Semester\SemesterController@createEditSemester')->name('semester.save');
        Route::post('/semester/remove', 'Semester\SemesterController@delSemester')->name('semester.remove');
        Route::post('/semester/filter_year', 'Semester\SemesterController@filterYear')->name('semester.filter');


    });
});
