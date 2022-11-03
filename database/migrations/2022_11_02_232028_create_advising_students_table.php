<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisingStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advising_students', function (Blueprint $table) {
            $table->id();
            $table->string('student_type');         
            $table->string('student_id')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('vaccination_status');
            $table->string('email');
            $table->string('gender');
            $table->date('birth_date');                                   
            $table->string('mobile_no');
            $table->string('fb_acc_name');
            $table->string('program');
            $table->string('first_period_sub');
            $table->string('second_period_sub');
            $table->string('third_period_sub'); 
            $table->string('time_first_period_sub');
            $table->string('time_second_period_sub');
            $table->string('time_third_period_sub'); 
            $table->string('first_period_instructor');
            $table->string('second_period_instructor');
            $table->string('third_period_instructor');
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
        Schema::dropIfExists('advising_students');
    }
}
