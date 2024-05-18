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
        Schema::create('calificacion_has_alumno', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Calificacion')->nullable();
            $table->unsignedBigInteger('id_Alumno')->nullable();
            $table->timestamps();

            // Definición de las claves foráneas
            $table->foreign('id_Calificacion')->references('id')->on('calificacion')->onDelete('cascade');
            $table->foreign('id_Alumno')->references('id')->on('alumno')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificacion_has_alumno');
    }
};
