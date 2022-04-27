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
        Schema::create('cash_registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clinic_id')->unsigned()->index();
            $table->foreign('clinic_id')->references('id')->on('clinics');

            $table->float('income')->nullable(); //ingresos
            $table->float('expenses')->nullable(); //egresos
            $table->float('credit')->nullable(); //saldos
            $table->date('date')->nullable(); //fecha
            $table->string('observations', 200)->nullable(); //observaciones
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
        Schema::dropIfExists('cash_registers');
    }
};
