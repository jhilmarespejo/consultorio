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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id')->unsigned()->index();
            $table->foreign('consultation_id')->references('id')->on('consultations');

            $table->string('nature', 150)->nullable(); //indole
            $table->string('type', 159)->nullable(); //tipo
            $table->string('description', 500)->nullable(); //descripcion
            $table->string('result', 300)->nullable(); //resultado
            $table->string('observations', 500)->nullable(); //observaciones
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
        Schema::dropIfExists('exams');
    }
};
