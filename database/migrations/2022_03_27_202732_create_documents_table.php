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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id')->unsigned()->index();
            $table->foreign('consultation_id')->references('id')->on('consultations');

            $table->string('name', 45)->nullable(); //nombre
            $table->string('description', 100)->nullable(); //descripcion
            $table->string('url', 300)->nullable();; //url
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
        Schema::dropIfExists('documents');
    }
};
