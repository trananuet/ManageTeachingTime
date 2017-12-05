<?php

Route::group(['middleware' => 'web',
            'prefix' => 'managecategory',
            'namespace' => 'Modules\ManageCategory\Http\Controllers'], function()
{
    Route::group(['middleware' => 'auth'],function()
    {

        //TRAINING 
        Route::get('/training', 'Training\TrainingController@getTraining')->name('training');
        Route::post('/training/save', 'Training\TrainingController@createEditTraining')->name('training.save');
        Route::post('/training/remove', 'Training\TrainingController@delTraining')->name('training.remove');
        Route::post('/training/import', 'Training\TrainingController@postImport')->name('training.import');

        //SCHOOL_YEAR
        Route::get('/school_year', 'SchoolYear\SchoolYearController@getSchoolYear')->name('school_year');
        Route::post('/school_year/save', 'SchoolYear\SchoolYearController@createEditSchoolYear')->name('school_year.save');
        Route::post('/school_year/remove', 'SchoolYear\SchoolYearController@delSchoolYear')->name('school_year.remove');
        // Route::post('/school_year/delete/{yearID}', 'SchoolYear\SchoolYearController@deleteOneSchoolYear')
        //         ->name('school_year.delete')
        //         ->where('yearID', '[0-9]+');
        Route::post('/school_year/filter_training', 'SchoolYear\SchoolYearController@filterTraining')->name('school_year.filter');
        Route::post('/school_year/import', 'SchoolYear\SchoolYearController@postImport')->name('school_year.import');

        
        //SEMESTER
        Route::get('/semester', 'Semester\SemesterController@getSemester')->name('semester')->middleware('check-mod-admin');
        Route::post('/semester/save', 'Semester\SemesterController@createEditSemester')->name('semester.save');
        Route::post('/semester/remove', 'Semester\SemesterController@delSemester')->name('semester.remove');
        Route::post('/semester/filter_year', 'Semester\SemesterController@filterYear')->name('semester.filter');
        // Route::post('/semester/delete/{semesterID}', 'Semester\SemesterController@deleteOneSemester')
        //         ->name('semester.delete')
        //         ->where('yearID', '[0-9]+');
        Route::post('/semester/import', 'Semester\SemesterController@postImport')->name('semester.import');


        //TITLE
        Route::get('/title', 'Title\TitleController@getTitle')->name('title');
        Route::post('/title/save', 'Title\TitleController@createEditTitle')->name('title.save');
        Route::post('/title/remove', 'Title\TitleController@delTitle')->name('title.remove');
    });
});
