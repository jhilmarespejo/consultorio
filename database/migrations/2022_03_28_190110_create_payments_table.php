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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->float('total')->nullable(); //total
            $table->float('onaccount')->nullable(); //acuenta
            $table->float('credit')->nullable(); //saldo
            $table->dateTime('date')->nullable(); //fecha
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
        Schema::dropIfExists('payments');
    }
};
