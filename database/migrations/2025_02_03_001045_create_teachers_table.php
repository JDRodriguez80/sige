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
        Schema::create('teachers', function (Blueprint $table) {

            $table->id();
            $table->string('nombres');
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('curp')->unique();
            $table->string('telefono')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->string('rfc')->unique();
            $table->string('cedula')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('observaciones')->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
