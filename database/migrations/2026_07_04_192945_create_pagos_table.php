<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('pagos', function (Blueprint $table) {
        $table->id();

        $table->foreignId('servicio_id')
              ->constrained('servicios')
              ->onDelete('cascade');

        $table->enum('metodo_pago', [
            'Efectivo',
            'Transferencia',
            'Tarjeta'
        ]);

        $table->decimal('monto', 8, 2);
        $table->date('fecha_pago');

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
