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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->string('mensaje', 45)->nullable();
            $table->date('fecha')->nullable();
            $table->string('esBorrador', 45)->nullable();
            $table->unsignedBigInteger('id_Usuario')->nullable();
            $table->unsignedBigInteger('id_UsuarioRecetor')->nullable();
            $table->timestamps();

            // Definición de las claves foráneas
            $table->foreign('id_Usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_UsuarioRecetor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
