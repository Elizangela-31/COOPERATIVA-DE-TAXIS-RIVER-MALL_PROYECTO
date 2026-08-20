<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{
    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('nombres');
        $table->string('apellidos');
        $table->string('cedula', 10)->unique();
        $table->string('telefono', 15);
        $table->string('direccion');
        $table->string('correo')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
