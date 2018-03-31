<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'data', 
    'namespace' => 'Modules\Data\Http\Controllers'], function()
{
    Route::group(['middleware' => 'auth'],function()
    {   
        //COURSE_LECTURER
        // Route::group(['middleware' => 'check_value'],function()
        // {        
            Route::get('/data_guide', 'Guide\GuideController@getGuide')->name('guide');
            Route::post('/data_guide/save', 'Guide\GuideController@createGuide')->name('guide.save');
            Route::post('/data_guide/remove', 'Guide\GuideController@removeGuide')->name('guide.remove');
            // Route::post('/course_lecturer/import', 'CourseLecturer\CourseLecturerController@postImport')->name('course_lecturer.import');
            // Route::post('/course_lecturer/filter_course_lecturer', 'CourseLecturer\CourseLecturerController@filterCourseLecturer')->name('course_lecturer.filter');
        // });

            Route::get('/teach', 'Teach\TeachController@getTeach')->name('teach');
            Route::post('/teach/save', 'Teach\TeachController@createEditDataTeach')->name('teach.save');
            Route::post('/teach/remove', 'Teach\TeachController@removelDataTeach')->name('teach.remove');
    });
});
