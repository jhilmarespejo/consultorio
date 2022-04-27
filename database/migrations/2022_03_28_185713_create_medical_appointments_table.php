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
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->date('date')->nullable(); //fecha
            $table->time('hour')->nullable(); //hora
            $table->string('observations', 500)->nullable(); //observacione
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
        Schema::dropIfExists('medical_appointments');
    }
};
