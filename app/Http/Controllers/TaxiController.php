<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\Socio;
use App\Models\Taxi;
use Illuminate\Http\Request;

class TaxiController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->string('buscar')->trim();
        $orden = in_array($request->orden, ['placa', 'marca', 'modelo', 'año', 'estado', 'created_at'], true)
            ? $request->orden : 'created_at';
        $direccion = $request->direccion === 'asc' ? 'asc' : 'desc';
        $taxis = Taxi::with(['socio','conductor'])
            ->when($buscar->isNotEmpty(), fn($q) => $q->where(function($sub) use ($buscar) {
                $sub->where('placa','like',"%{$buscar}%")->orWhere('marca','like',"%{$buscar}%")->orWhere('modelo','like',"%{$buscar}%");
            }))->orderBy($orden, $direccion)->paginate(10)->withQueryString();
        return view('taxis.lista', compact('taxis','buscar', 'orden', 'direccion'));
    }
    public function create() { return view('taxis.crear', $this->catalogos()); }
    public function store(Request $request) { Taxi::create($this->validar($request)); return redirect()->route('taxis.index')->with('success','Taxi registrado correctamente.'); }
    public function show(Taxi $taxi) { return redirect()->route('taxis.edit',$taxi); }
    public function edit(Taxi $taxi) { return view('taxis.editar', array_merge($this->catalogos(), compact('taxi'))); }
    public function update(Request $request, Taxi $taxi) { $taxi->update($this->validar($request,$taxi->id)); return redirect()->route('taxis.index')->with('success','Taxi actualizado correctamente.'); }
    public function destroy(Taxi $taxi) { $taxi->delete(); return redirect()->route('taxis.index')->with('success','Taxi eliminado correctamente.'); }
    private function catalogos(): array { return ['socios'=>Socio::orderBy('nombres')->get(),'conductores'=>Conductor::orderBy('nombres')->get()]; }
    private function validar(Request $request, ?int $id=null): array
    {
        return $request->validate([
            'socio_id'=>['required','exists:socios,id'], 'conductor_id'=>['required','exists:conductors,id'],
            'placa'=>['required','string','max:10','unique:taxis,placa'.($id?",{$id}":'')],
            'marca'=>['required','string','max:60'], 'modelo'=>['required','string','max:60'], 'color'=>['required','string','max:40'],
            'año'=>['required','integer','min:1990','max:'.(date('Y')+1)],
            'estado'=>['required','in:Disponible,En servicio,Mantenimiento'],
        ]);
    }
}
