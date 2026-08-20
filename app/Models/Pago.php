<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['servicio_id', 'metodo_pago', 'monto', 'fecha_pago'];

    protected $casts = ['fecha_pago' => 'date', 'monto' => 'decimal:2'];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
