<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('servicios', function (Blueprint $table) {
        $table->id();

        $table->foreignId('cliente_id')
              ->constrained('clientes')
              ->onDelete('cascade');

        $table->foreignId('conductor_id')
              ->constrained('conductors')
              ->onDelete('cascade');

        $table->foreignId('taxi_id')
              ->constrained('taxis')
              ->onDelete('cascade');

        $table->string('origen');
        $table->string('destino');
        $table->date('fecha');
        $table->time('hora');
        $table->decimal('valor', 8, 2);

        $table->enum('estado', [
            'Pendiente',
            'En curso',
            'Finalizado',
            'Cancelado'
        ])->default('Pendiente');

        $table->timestamps();
    });
} 
   

    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
