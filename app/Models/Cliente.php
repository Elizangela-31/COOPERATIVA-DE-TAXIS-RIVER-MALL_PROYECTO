<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellidos', 'cedula', 'telefono', 'direccion', 'correo'];

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
