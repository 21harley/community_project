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
        Schema::create('maestro_has_grupo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Maestro')->nullable();
            $table->unsignedBigInteger('id_Grupo')->nullable();
            $table->timestamps();

            // Definición de las claves foráneas
            $table->foreign('id_Maestro')->references('id')->on('maestro')->onDelete('cascade');
            $table->foreign('id_Grupo')->references('id')->on('grupo')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestro_has_grupo');
    }
};
