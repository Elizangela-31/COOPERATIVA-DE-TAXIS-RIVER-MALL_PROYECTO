<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Conductor;
use App\Models\Pago;
use App\Models\Servicio;
use App\Models\Socio;
use App\Models\Taxi;
use Illuminate\View\View;

class PanelController extends Controller
{
    public function index(): View
    {
        return view('panel.lista', [
            'totalSocios' => Socio::count(),
            'totalConductores' => Conductor::count(),
            'totalTaxis' => Taxi::count(),
            'totalClientes' => Cliente::count(),
            'totalServicios' => Servicio::count(),
            'totalPagos' => Pago::sum('monto'),
            'ultimosServicios' => Servicio::with(['cliente', 'conductor', 'taxi'])->latest()->take(5)->get(),
        ]);
    }
}
