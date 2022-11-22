<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
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
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('baranggay');
            $table->string('program');
            $table->string('first_period_sub');
            $table->string('second_period_sub');
            $table->string('third_period_sub');  
            $table->string('first_period_sched');
            $table->string('second_period_sched');
            $table->string('third_period_sched'); 
            $table->string('first_period_adviser');
            $table->string('second_period_adviser');
            $table->string('third_period_adviser');
            $table->string('title');
            $table->string('member_1');
            $table->string('member_2');
            $table->string('member_3');
            $table->string('panelist_1');
            $table->string('panelist_2');
            $table->string('panelist_3');
            $table->string('adviser');
            $table->string('date');
            $table->string('time');
            $table->string('venue');
            $table->string('link');
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
        Schema::dropIfExists('student_users');
    }
}
