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
        Schema::create('medical_backgrounds', function (Blueprint $table) {
            //medical background
            $table->id();
            $table->unsignedBigInteger('patient_id')->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->string('nature', 500)->nullable(); //índole
            $table->string('type', 700)->nullable(); //tipo
            $table->string('description', 700)->nullable(); //descripción
            $table->string('observations', 150)->nullable(); //observaciones

            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_backgrounds');
    }
};
