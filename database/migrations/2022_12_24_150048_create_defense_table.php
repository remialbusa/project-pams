<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defense', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('member_1')->nullable();
            $table->string('member_2')->nullable();
            $table->string('member_3')->nullable();
            $table->string('panelist_1')->nullable();
            $table->string('panelist_2')->nullable();
            $table->string('panelist_3')->nullable();
            $table->string('adviser')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('venue')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('defense');
    }
}
