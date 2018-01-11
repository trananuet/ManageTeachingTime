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
            $table->string('teacherName');
            $table->string('courseName');
            $table->integer('semesterID');
            $table->integer('number_of_students');
            $table->string('course_group');
            $table->string('theory_group');
            $table->integer('theory_in_hour');
            $table->integer('theory_overtime');
            $table->integer('theory_day_off');
            $table->integer('theory_standard');
            $table->string('practice_group');
            $table->integer('practice_in_hour');
            $table->integer('practice_overtime');
            $table->integer('practice_day_off');
            $table->integer('practice_standard');
            $table->integer('self_learning_time');
            $table->integer('self_learning_standard');
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
