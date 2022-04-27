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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clinic_id')->unsigned()->index();
            $table->foreign('clinic_id')->references('id')->on('clinics');
            
            $table->string('names', 200); //nombres
            $table->string('surnames', 200); //apellidos
            $table->string('sex', 10); //sexo
            $table->date('birth_date'); //fecha_nacimiento
            $table->string('cellphone', 20)->nullable(); //celular
            $table->string('blood_type', 10)->nullable(); //grupo_sanguineo
            $table->string('cell_reference', 20)->nullable(); //celular_referencia
            $table->string('civil_status', 250)->nullable(); //estado_civil
            $table->string('mail', 50)->nullable(); //correo
            $table->string('home', 250)->nullable(); //domicilio
            $table->string('responsible_person', 350)->nullable(); //persona_responsable
            $table->string('responsible_person_cell', 20)->nullable(); //celular_persona_responsable
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
        Schema::dropIfExists('patients');
    }
};
