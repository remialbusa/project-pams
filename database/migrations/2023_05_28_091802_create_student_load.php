<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLoad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_loads', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id')->references('id')->on('constituents')->onDelete('cascade');
            $table->string('student_id')->references('id')->on('enrolled_students')->onDelete('cascade');
            $table->integer('school_year_id')->references('id')->on('school_year')->onDelete('cascade');
            $table->string('adviser');
            $table->string('period');
            $table->string('program');
            $table->string('semester')->nullable();
            $table->string('sub_sched');
            $table->timestamps();
        });

        Schema::create('school_year_enrollees', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->references('id')->on('enrolled_students')->onDelete('cascade');
            $table->integer('school_year_id')->references('id')->on('school_year')->onDelete('cascade');
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
        Schema::dropIfExists('student_loads');
        Schema::dropIfExists('school_year_enrollees');
    }
}
