<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('curp')->unique();
            $table->string('telefono');
            $table->string('email')->unique()->nullable();
            $table->string('direccion');
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['Masculino', 'Femenino']);
            $table->text('observaciones')->nullable();
            $table->text('foto')->nullable();
            $table->bigInteger('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('groups');
            $table->bigInteger('guardian_id')->unsigned();
            $table->foreign('guardian_id')->references('id')->on('guardians');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
