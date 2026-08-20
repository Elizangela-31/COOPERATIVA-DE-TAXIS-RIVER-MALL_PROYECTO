<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'conductor_id', 'taxi_id', 'origen', 'destino', 'fecha', 'hora', 'valor', 'estado'];

    protected $casts = ['fecha' => 'date', 'valor' => 'decimal:2'];

    public function cliente() { return $this->belongsTo(Cliente::class); }
    public function conductor() { return $this->belongsTo(Conductor::class); }
    public function taxi() { return $this->belongsTo(Taxi::class); }
    public function pago() { return $this->hasOne(Pago::class); }
}
