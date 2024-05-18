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
        Schema::create('foro', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 45)->nullable();
            $table->string('Descripcion', 45)->nullable();
            $table->unsignedBigInteger('id_Asignatura')->nullable();
            $table->timestamps();

            // Definición de la clave foránea
            $table->foreign('id_Asignatura')->references('id')->on('asignatura')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foro');
    }
};
