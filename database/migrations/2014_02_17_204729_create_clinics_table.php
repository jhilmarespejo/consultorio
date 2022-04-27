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
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 300);
            $table->string('appointment_interval', 10);// intervalo de citas
            $table->string('clinic', 150); // nombre de la clinica
            $table->string('direction', 250);
            $table->string('responsable', 100);
            $table->string('cellphone', 20);
            $table->string('email', 100);
            $table->string('nit', 30);
            $table->string('registry', 30); // algun numero de registro de funcionamiento
            $table->string('Schedule', 100); //horarios
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
        Schema::dropIfExists('clinics');
    }
};
