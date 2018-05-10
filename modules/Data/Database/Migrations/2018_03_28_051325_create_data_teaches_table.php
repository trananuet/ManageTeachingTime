<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTeachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_teaches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teacherName');
            $table->string('courseName');
            $table->integer('semesterID');
            $table->integer('number_of_students')->nullable();
            $table->string('course_group')->nullable();
            $table->string('theory_group')->nullable();
            $table->float('number_student_theory', 8, 2)->nullable();
            $table->float('sum_theory_hour', 8, 2)->nullable();
            $table->float('theory_in_hour', 8, 2)->nullable();
            $table->float('theory_overtime', 8, 2)->nullable();
            $table->float('theory_day_off', 8, 2)->nullable();
            // $table->integer('theory_standard');
            $table->string('practice_group')->nullable();
            $table->float('number_student_practice', 8, 2)->nullable();
            $table->float('sum_practice_hour', 8, 2)->nullable();
            $table->float('practice_in_hour', 8, 2)->nullable();
            $table->float('practice_overtime', 8, 2)->nullable();
            $table->float('practice_day_off', 8, 2)->nullable();
            // $table->integer('practice_standard');
            $table->float('self_learning_time', 8, 2)->nullable();
            // $table->integer('self_learning_standard');
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
        Schema::dropIfExists('data_teaches');
    }
}
