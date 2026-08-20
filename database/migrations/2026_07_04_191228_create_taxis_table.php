<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración.
     */
   public function up(): void
{
    Schema::create('taxis', function (Blueprint $table) {
        $table->id();

        $table->foreignId('socio_id')
              ->constrained('socios')
              ->onDelete('cascade');

        $table->foreignId('conductor_id')
              ->constrained('conductors')
              ->onDelete('cascade');

        $table->string('placa')->unique();
        $table->string('marca');
        $table->string('modelo');
        $table->string('color');
        $table->year('año');
        $table->enum('estado', ['Disponible', 'En servicio', 'Mantenimiento'])
              ->default('Disponible');

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('taxis');
    }
};
