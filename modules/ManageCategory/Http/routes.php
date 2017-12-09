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

        //FACULTY
        Route::get('/faculty', 'Faculty\FacultyController@getFaculty')->name('faculty');
        Route::post('/faculty/save', 'Faculty\FacultyController@createEditFaculty')->name('faculty.save');
        Route::post('/faculty/remove', 'Faculty\FacultyController@delFaculty')->name('faculty.remove');

        //TEACHER
        Route::get('/teacher', 'Teacher\TeacherController@getTeacher')->name('teacher');
        Route::post('/teacher/save', 'Teacher\TeacherController@createEditTeacher')->name('teacher.save');
        Route::post('/teacher/remove', 'Teacher\TeacherController@delTeacher')->name('teacher.remove');

        //COURSES
        Route::get('/courses', 'Courses\CoursesController@getCourses')->name('courses');
        Route::post('/courses/save', 'Courses\CoursesController@createEditCourses')->name('courses.save');
        Route::post('/courses/remove', 'Courses\CoursesController@delCourses')->name('courses.remove');

        //THESIS
        Route::get('/thesis', 'Thesis\ThesisController@getThesis')->name('thesis');
        Route::post('/thesis/save', 'Thesis\ThesisController@createEditThesis')->name('thesis.save');
        Route::post('/thesis/remove', 'Thesis\ThesisController@delThesis')->name('thesis.remove');

        //SALARY
        Route::get('/salary', 'Salary\SalaryController@getSalary')->name('salary');
        Route::post('/salary/save', 'Salary\SalaryController@createEditSalary')->name('salary.save');
        Route::post('/salary/remove', 'Salary\SalaryController@delSalary')->name('salary.remove');


        //COURSELECTURER
        Route::get('/course_lecturer', 'CourseLecturer\CourseLecturerController@getCourseLecturer')->name('course_lecturer');
        Route::post('/course_lecturer/save', 'CourseLecturer\CourseLecturerController@createEditCourseLecturer')->name('course_lecturer.save');
        Route::post('/course_lecturer/remove', 'CourseLecturer\CourseLecturerController@delCourseLecturer')->name('course_lecturer.remove');

        //COURSELECTURER
        Route::get('/thesis_lecturer', 'ThesisLecturer\ThesisLecturerController@getThesisLecturer')->name('thesis_lecturer');
        Route::post('/thesis_lecturer/save', 'ThesisLecturer\ThesisLecturerController@createEditThesisLecturer')->name('thesis_lecturer.save');
        Route::post('/thesis_lecturer/remove', 'ThesisLecturer\ThesisLecturerController@delThesisLecturer')->name('thesis_lecturer.remove');
    });
});
