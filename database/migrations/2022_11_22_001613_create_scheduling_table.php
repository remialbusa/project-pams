<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduling', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('member_1');
            $table->string('member_2');
            $table->string('member_3');
            $table->string('panelist_1');
            $table->string('panelist_2');
            $table->string('panelist_3');
            $table->string('adviser');
            $table->date('date');
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
        Schema::dropIfExists('scheduling');
    }
}
