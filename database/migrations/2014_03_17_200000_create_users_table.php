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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('clinic_id')->nullable()->unsigned()->index();
            $table->foreign('clinic_id')->references('id')->on('clinics');
            
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('specialty')->nullable(); //especialidad
            $table->string('ci')->nullable();
            $table->string('professional_register')->nullable(); //reg_profesional
            $table->string('birth_date')->nullable(); //fecha_nacimiento
            $table->string('address')->nullable(); //direccion
            $table->string('cellphone')->nullable(); //celular

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
