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
    Schema::create('ejercicios', function (Blueprint $table) {
        $table->id(); // El ID automático (1, 2, 3...)
        $table->string('titulo'); // Ej: Sentadilla isométrica
        $table->text('descripcion'); // Instrucciones del ejercicio
        $table->string('lesion_recomendada'); // Ej: Dolor de rodilla
        $table->string('dificultad')->default('Principiante');
        $table->string('duracion')->nullable(); // Ej: 10 min
        $table->string('repeticiones')->nullable(); // Ej: 3 x 15
        $table->string('imagen_url')->nullable(); // Foto (puede estar vacía)
        $table->timestamps(); // Guarda la fecha de creación automáticamente
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios');
    }
};
