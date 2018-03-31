<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'statistic', 
    'namespace' => 'Modules\Statistic\Http\Controllers'], function()
{
    Route::group(['middleware' => 'auth'],function()
    {   
        //COURSE_LECTURER
        Route::group(['middleware' => 'check_manage_course_lecturer'],function()
        {        
            Route::get('/statistic_course', 'StatisticCourse\StatisticCourseController@getTeach')->name('course_lecturer');
            // Route::post('/course_lecturer/save', 'CourseLecturer\CourseLecturerController@createEditCourseLecturer')->name('course_lecturer.save');
            // Route::post('/course_lecturer/remove', 'CourseLecturer\CourseLecturerController@delCourseLecturer')->name('course_lecturer.remove');
            // Route::post('/course_lecturer/import', 'CourseLecturer\CourseLecturerController@postImport')->name('course_lecturer.import');
            // Route::post('/course_lecturer/filter_course_lecturer', 'CourseLecturer\CourseLecturerController@filterCourseLecturer')->name('course_lecturer.filter');
        });
        //THESIS_LECTURER
        Route::group(['middleware' => 'check_manage_thesis_lecturer'],function()
        {        
            Route::get('/thesis_lecturer', 'ThesisLecturer\ThesisLecturerController@getThesisLecturer')->name('thesis_lecturer');
            // Route::post('/thesis_lecturer/save', 'ThesisLecturer\ThesisLecturerController@createEditThesisLecturer')->name('thesis_lecturer.save');
            // Route::post('/thesis_lecturer/remove', 'ThesisLecturer\ThesisLecturerController@delThesisLecturer')->name('thesis_lecturer.remove');
        });
        //STATISTIC
        Route::get('/statistic_hour', 'Statistic\StatisticController@getStatistic')->name('statistic');
        Route::get('/statistic_hour/pdf', 'Statistic\StatisticController@exportPDF')->name('statistic.pdf');
    });
});
