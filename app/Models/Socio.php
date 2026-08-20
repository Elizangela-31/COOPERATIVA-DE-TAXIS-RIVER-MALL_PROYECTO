<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'telefono',
        'direccion',
        'correo',
        'estado'
    ];

    public function conductores() { return $this->hasMany(Conductor::class); }
    public function taxis() { return $this->hasMany(Taxi::class); }
}
