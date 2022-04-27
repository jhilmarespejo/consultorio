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
        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('patients');
            
            $table->string('trigger', 150)->nullable(); //agente desencadenante
            $table->string('answer', 500)->nullable(); //respuesta
            $table->string('control', 500)->nullable(); //control
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
        Schema::dropIfExists('allergies');
    }
};
