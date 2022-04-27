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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('patient_id')->nullable()->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->unsignedBigInteger('user_id')/*->nullable()*/->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('motive', 200); //motivo
            $table->text('description')->nullable(); //descripcion
            $table->string('diagnostic', 350)->nullable(); //diagnostico
            $table->string('forecast', 350)->nullable(); //pronostico
            $table->string('treatment', 250)->nullable(); //tratamiento
            $table->string('observations', 350)->nullable(); //observaciones
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
        Schema::dropIfExists('consultations');
    }
};
