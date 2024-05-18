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
        Schema::create('asignatura', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_Materia', 45)->nullable();
            $table->unsignedBigInteger('id_Alumno')->nullable();
            $table->timestamps();
            
            // Definición de la clave foránea
            $table->foreign('id_Alumno')->references('id')->on('alumno')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignatura');
    }
};
