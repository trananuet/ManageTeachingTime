<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesisLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_lecturers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacherID');
            $table->integer('khoa_luan');
            $table->integer('luan_van');
            $table->integer('luan_an');
            $table->integer('nien_luan');
            $table->integer('sum_thesis');
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
        Schema::dropIfExists('thesis_lecturers');
    }
}
