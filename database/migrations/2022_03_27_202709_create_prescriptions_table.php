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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id')->unsigned()->index();
            $table->foreign('consultation_id')->references('id')->on('consultations');
            
            $table->string('medicine', 200)->nullable(); //medicamento
            $table->string('presentation', 150)->nullable(); //presentacion
            $table->string('quantity', 5)->nullable(); //cantidad
            $table->string('indication', 300)->nullable(); //indicacion
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
        Schema::dropIfExists('prescriptions');
    }
};
