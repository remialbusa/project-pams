<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSchoolEnrollesAddEnrolledStudentTableId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_year_enrollees', function (Blueprint $table) {
            $table->string('enrolled_student_table_id')->references('id')->on('enrolled_students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_year_enrollees', function (Blueprint $table) {
            $table->dropColumn('enrolled_student_table_id');
        });
    }
}
