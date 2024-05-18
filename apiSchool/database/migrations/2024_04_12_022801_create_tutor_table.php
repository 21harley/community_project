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
        Schema::create('tutor', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 45)->nullable();
            $table->string('Cedula', 45)->nullable();
            $table->string('Apellido_Paterno', 45)->nullable();
            $table->string('Apellido_Materno', 45)->nullable();
            $table->string('Telefono', 45)->nullable();
            $table->unsignedBigInteger('id_TipoParentesco')->unsigned();
            $table->unsignedBigInteger('id_Usuario')->unsigned();
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('id_TipoParentesco')->references('id')->on('tipo_parentesco')->onDelete('cascade');
            $table->foreign('id_Usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor');
    }
};
