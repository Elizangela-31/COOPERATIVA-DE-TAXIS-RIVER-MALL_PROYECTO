<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Conductor;
use App\Models\Servicio;
use App\Models\Taxi;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index(Request $request)
    {
        $buscar=$request->string('buscar')->trim();
        $orden = in_array($request->orden, ['fecha', 'valor', 'estado', 'created_at'], true)
            ? $request->orden : 'fecha';
        $direccion = $request->direccion === 'asc' ? 'asc' : 'desc';
        $servicios=Servicio::with(['cliente','conductor','taxi'])
            ->when($buscar->isNotEmpty(),fn($q)=>$q->where(function($s)use($buscar){$s->where('origen','like',"%{$buscar}%")->orWhere('destino','like',"%{$buscar}%")->orWhere('estado','like',"%{$buscar}%");}))
            ->orderBy($orden, $direccion)->paginate(10)->withQueryString();
        return view('servicios.lista',compact('servicios','buscar', 'orden', 'direccion'));
    }
    public function create(){return view('servicios.crear',$this->catalogos());}
    public function store(Request $request){Servicio::create($this->validar($request));return redirect()->route('servicios.index')->with('success','Servicio registrado correctamente.');}
    public function show(Servicio $servicio){return redirect()->route('servicios.edit',$servicio);}
    public function edit(Servicio $servicio){return view('servicios.editar',array_merge($this->catalogos(),compact('servicio')));}
    public function update(Request $request,Servicio $servicio){$servicio->update($this->validar($request));return redirect()->route('servicios.index')->with('success','Servicio actualizado correctamente.');}
    public function destroy(Servicio $servicio){$servicio->delete();return redirect()->route('servicios.index')->with('success','Servicio eliminado correctamente.');}
    private function catalogos():array{return ['clientes'=>Cliente::orderBy('nombres')->get(),'conductores'=>Conductor::orderBy('nombres')->get(),'taxis'=>Taxi::orderBy('placa')->get()];}
    private function validar(Request $request):array{return $request->validate([
        'cliente_id'=>['required','exists:clientes,id'],'conductor_id'=>['required','exists:conductors,id'],'taxi_id'=>['required','exists:taxis,id'],
        'origen'=>['required','string','max:255'],'destino'=>['required','string','max:255'],'fecha'=>['required','date'],'hora'=>['required'],'valor'=>['required','numeric','min:0'],
        'estado'=>['required','in:Pendiente,En curso,Finalizado,Cancelado'],
    ]);}
}
