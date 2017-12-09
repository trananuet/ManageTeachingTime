<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lecturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('teacherID');
            $table->integer('courseID');
            $table->integer('semesterID');
            $table->integer('yearID');
            $table->integer('number_of_students');
            $table->integer('hour_theory');
            $table->integer('practice_hours');
            $table->integer('learning_time');
            $table->integer('in_hours');
            $table->integer('overtime');
            $table->integer('day_off');
            $table->double('converted_hours');
            $table->double('exchange');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_lecturers');
    }
}
