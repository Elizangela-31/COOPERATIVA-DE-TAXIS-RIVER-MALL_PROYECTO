<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductors';

    protected $fillable = ['socio_id', 'nombres', 'apellidos', 'cedula', 'licencia', 'telefono', 'estado'];

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }

    public function taxis()
    {
        return $this->hasMany(Taxi::class);
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
