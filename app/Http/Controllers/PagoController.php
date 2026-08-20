<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Servicio;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->string('buscar')->trim();
        $orden = in_array($request->orden, ['fecha_pago', 'monto', 'metodo_pago', 'created_at'], true)
            ? $request->orden : 'fecha_pago';
        $direccion = $request->direccion === 'asc' ? 'asc' : 'desc';
        $pagos = Pago::with('servicio.cliente')
            ->when($buscar->isNotEmpty(), fn ($q) => $q->where(function ($sub) use ($buscar) {
                $sub->where('metodo_pago', 'like', "%{$buscar}%")
                    ->orWhereHas('servicio.cliente', fn ($cliente) => $cliente
                        ->where('nombres', 'like', "%{$buscar}%")
                        ->orWhere('apellidos', 'like', "%{$buscar}%"));
            }))
            ->orderBy($orden, $direccion)->paginate(10)->withQueryString();
        return view('pagos.lista', compact('pagos', 'buscar', 'orden', 'direccion'));
    }
    public function create(){return view('pagos.crear',['servicios'=>Servicio::with('cliente')->latest()->get()]);}
    public function store(Request $request){Pago::create($this->validar($request));return redirect()->route('pagos.index')->with('success','Pago registrado correctamente.');}
    public function show(Pago $pago){return redirect()->route('pagos.edit',$pago);}
    public function edit(Pago $pago){return view('pagos.editar',['pago'=>$pago,'servicios'=>Servicio::with('cliente')->latest()->get()]);}
    public function update(Request $request,Pago $pago){$pago->update($this->validar($request));return redirect()->route('pagos.index')->with('success','Pago actualizado correctamente.');}
    public function destroy(Pago $pago){$pago->delete();return redirect()->route('pagos.index')->with('success','Pago eliminado correctamente.');}
    private function validar(Request $request):array{return $request->validate([
        'servicio_id'=>['required','exists:servicios,id'],'metodo_pago'=>['required','in:Efectivo,Transferencia,Tarjeta'],'monto'=>['required','numeric','min:0'],'fecha_pago'=>['required','date'],
    ]);}
}
