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
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('consultation_id')->unsigned()->index();
            $table->foreign('consultation_id')->references('id')->on('consultations');

            $table->Integer('weight')->nullable(); //peso
            $table->Integer('size')->nullable(); //talla
            $table->string('heart_rate', 20)->nullable(); //frecCardiaca
            $table->string('respiratory_rate', 20)->nullable(); //frecRespiratoria
            $table->string('arterial_pressure', 20)->nullable(); //presionArterial
            $table->string('observations', 200)->nullable(); //observaciones
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
        Schema::dropIfExists('vital_signs');
    }
};
