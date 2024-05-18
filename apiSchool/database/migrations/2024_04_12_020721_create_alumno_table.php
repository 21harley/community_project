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
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo',45)->nullable();
            $table->string('genero',45)->nullable();
            $table->string('cedula',45)->nullable();
            $table->string('fecha_nacimiento',45)->nullable();
            $table->string('direccion',45)->nullable();
            $table->string('telefono',45)->nullable();
            $table->unsignedBigInteger('id_Grupo')->unsigned();
            $table->string('Grado', 45)->nullable();
            $table->unsignedBigInteger('id_Usuario')->unsigned();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_Grupo')->references('id')->on('grupo')->onDelete('cascade');
            $table->foreign('id_Usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno');
    }
};
