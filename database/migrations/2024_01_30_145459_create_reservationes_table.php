<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservationes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->enum('gender',['male','female'])->default('male');
            $table->integer('age');
            $table->enum('detection_type',['normal','urgent'])->default('normal');
            $table->enum('detection_location',['home','clinic'])->default('clinic');
            $table->date('day_booking');
            $table->time('time_booking');
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
        Schema::dropIfExists('reservationes');
    }
};
