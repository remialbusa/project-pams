<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolledStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolled_students', function (Blueprint $table) {
            $table->id();
            $table->string('student_type');
            $table->string('program');
            $table->string('first_period');
            $table->string('second_period');
            $table->string('third_period');          
            $table->integer('student_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('nationality');
            $table->string('contact_no');
            $table->string('email');
            $table->string('zipcode');
            $table->string('home_address');
            $table->string('guardian');
            $table->string('guardian_contact_no');
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
        Schema::dropIfExists('enrolled_students');
    }
}
