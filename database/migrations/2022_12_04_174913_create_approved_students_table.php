<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovedStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_students', function (Blueprint $table) {
            $table->uuid('id')->primary();    
            $table->string('student_type');         
            $table->string('student_id')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
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
            $table->string('file');
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
            $table->string('first_procedure');
            $table->string('second_procedure');
            $table->string('third_procedure');
            $table->string('enrollment_status')->nullable();
            $table->string('enrollment_file')->nullable();
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
        Schema::dropIfExists('approved_students');
    }
}
