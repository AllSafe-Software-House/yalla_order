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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('descrption');
            $table->time('starttime')->nullable();
            $table->time('endtime')->nullable();
            $table->string('address');
            $table->string('logo')->nullable();
            $table->enum('type',['clinic','restaurantes']);
            $table->enum('status',['open','closed'])->default('open');;
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
        Schema::dropIfExists('places');
    }
};
