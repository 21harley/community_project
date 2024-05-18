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
        Schema::create('maestro', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_Completo', 45)->nullable();
            $table->string('direccion', 45)->nullable();
            $table->string('telefono', 45)->nullable();
            $table->string('correo_electronico', 45)->nullable();
            $table->string('cedula', 45)->nullable();
            $table->string('RIF', 45)->nullable();
            $table->unsignedBigInteger('id_Asignatura')->nullable();
            $table->unsignedBigInteger('id_CargoInstitucional')->nullable();
            $table->unsignedBigInteger('id_Usuario')->nullable();
            $table->timestamps();

            // Definición de las claves foráneas
            $table->foreign('id_Asignatura')->references('id')->on('asignatura')->onDelete('cascade');
            $table->foreign('id_CargoInstitucional')->references('id')->on('cargo_institucional')->onDelete('cascade');
            $table->foreign('id_Usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestro');
    }
};
