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
        Schema::create('habits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->string('nutrition', 500)->nullable(); //alimentacion
            $table->string('appetite', 500)->nullable(); //apetito
            $table->string('gut_catharsis', 300)->nullable(); //catarsis_intestinal
            $table->string('diuresis', 45)->nullable(); //diuresis
            $table->string('sleep', 250)->nullable(); //sueno
            $table->string('alcohol', 250)->nullable(); //alcohol
            $table->string('infusions', 250)->nullable(); //infusiones
            $table->string('drugs', 250)->nullable(); //drogas
            $table->string('tobacco', 250)->nullable(); //tabaco
            $table->string('observations', 250)->nullable(); //observaciones
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
        Schema::dropIfExists('habits');
    }
};
