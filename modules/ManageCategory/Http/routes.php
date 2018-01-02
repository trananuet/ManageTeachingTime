<?php

Route::group(['middleware' => 'web',
            'prefix' => 'managecategory',
            'namespace' => 'Modules\ManageCategory\Http\Controllers'], function()
{
    Route::group(['middleware' => 'auth'],function()
    {

        //TRAINING
        Route::group(['middleware' => 'check_manage_training'],function()
        {
            Route::get('/training', 'Training\TrainingController@getTraining')->name('training');
            Route::post('/training/save', 'Training\TrainingController@createEditTraining')->name('training.save');
            Route::post('/training/remove', 'Training\TrainingController@delTraining')->name('training.remove');
            Route::post('/training/import', 'Training\TrainingController@postImport')->name('training.import');
        });
        //SCHOOL_YEAR
        Route::group(['middleware' => 'check_manage_school_year'],function()
        {
            Route::get('/school_year', 'SchoolYear\SchoolYearController@getSchoolYear')->name('school_year');
            Route::post('/school_year/save', 'SchoolYear\SchoolYearController@createEditSchoolYear')->name('school_year.save');
            Route::post('/school_year/remove', 'SchoolYear\SchoolYearController@delSchoolYear')->name('school_year.remove');
            Route::post('/school_year/filter_training', 'SchoolYear\SchoolYearController@filterTraining')->name('school_year.filter');
            Route::post('/school_year/import', 'SchoolYear\SchoolYearController@postImport')->name('school_year.import');
        });

        
        //SEMESTER
        Route::group(['middleware' => 'check_manage_semester'],function()
        {
            Route::get('/semester', 'Semester\SemesterController@getSemester')->name('semester');
            Route::post('/semester/save', 'Semester\SemesterController@createEditSemester')->name('semester.save');
            Route::post('/semester/remove', 'Semester\SemesterController@delSemester')->name('semester.remove');
            Route::post('/semester/filter_year', 'Semester\SemesterController@filterYear')->name('semester.filter');
            Route::post('/semester/import', 'Semester\SemesterController@postImport')->name('semester.import');
        });


        //TITLE
        Route::group(['middleware' => 'check_manage_title'],function()
        {
            Route::get('/title', 'Title\TitleController@getTitle')->name('title');
            Route::post('/title/save', 'Title\TitleController@createEditTitle')->name('title.save');
            Route::post('/title/remove', 'Title\TitleController@delTitle')->name('title.remove');
            Route::post('/title/import', 'Title\TitleController@postImport')->name('title.import');
        });        

        //FACULTY
        Route::group(['middleware' => 'check_manage_faculty'],function()
        {
            Route::get('/faculty', 'Faculty\FacultyController@getFaculty')->name('faculty');
            Route::post('/faculty/save', 'Faculty\FacultyController@createEditFaculty')->name('faculty.save');
            Route::post('/faculty/remove', 'Faculty\FacultyController@delFaculty')->name('faculty.remove');
            Route::post('/faculty/import', 'Faculty\FacultyController@postImport')->name('faculty.import');
        });      
        //TEACHER
        Route::group(['middleware' => 'check_manage_teacher'],function()
        {
            Route::get('/teacher', 'Teacher\TeacherController@getTeacher')->name('teacher');
            Route::post('/teacher/save', 'Teacher\TeacherController@createEditTeacher')->name('teacher.save');
            Route::post('/teacher/remove', 'Teacher\TeacherController@delTeacher')->name('teacher.remove');
        });     

        //COURSES
        Route::group(['middleware' => 'check_manage_course'],function()
        {
            Route::get('/courses', 'Courses\CoursesController@getCourses')->name('courses');
            Route::post('/courses/save', 'Courses\CoursesController@createEditCourses')->name('courses.save');
            Route::post('/courses/remove', 'Courses\CoursesController@delCourses')->name('courses.remove');
            Route::post('/courses/filter', 'Courses\CoursesController@filterCourses')->name('courses.filter');
            Route::post('/courses/import', 'Courses\CoursesController@postImport')->name('courses.import');
        });    

        //THESIS
        Route::group(['middleware' => 'check_manage_thesis'],function()
        {
            Route::get('/thesis', 'Thesis\ThesisController@getThesis')->name('thesis');
            Route::post('/thesis/save', 'Thesis\ThesisController@createEditThesis')->name('thesis.save');
            Route::post('/thesis/remove', 'Thesis\ThesisController@delThesis')->name('thesis.remove');
            Route::post('/thesis/import', 'Thesis\ThesisController@postImport')->name('thesis.import');
        });   

        //SALARY
        Route::group(['middleware' => 'check_manage_salary'],function()
        {
            Route::get('/salary', 'Salary\SalaryController@getSalary')->name('salary');
            Route::post('/salary/save', 'Salary\SalaryController@createEditSalary')->name('salary.save');
            Route::post('/salary/remove', 'Salary\SalaryController@delSalary')->name('salary.remove');
        });
    });
});