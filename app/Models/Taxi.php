<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    use HasFactory;

    protected $fillable = ['socio_id', 'conductor_id', 'placa', 'marca', 'modelo', 'color', 'año', 'estado'];

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }

    public function conductor()
    {
        return $this->belongsTo(Conductor::class);
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
