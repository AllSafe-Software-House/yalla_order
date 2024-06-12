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
        Schema::create('doctores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->foreignId('place_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->time('starttime')->nullable();
            $table->time('endtime')->nullable();
            $table->json('dayes');
            $table->decimal('price_fees');
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
        Schema::dropIfExists('doctores');

    }
};
