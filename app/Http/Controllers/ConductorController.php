<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\Socio;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->string('buscar')->trim();
        $orden = in_array($request->orden, ['nombres', 'apellidos', 'cedula', 'licencia', 'estado', 'created_at'], true)
            ? $request->orden : 'created_at';
        $direccion = $request->direccion === 'asc' ? 'asc' : 'desc';
        $conductores = Conductor::with('socio')
            ->when($buscar->isNotEmpty(), fn ($q) => $q->where(function ($sub) use ($buscar) {
                $sub->where('nombres', 'like', "%{$buscar}%")
                    ->orWhere('apellidos', 'like', "%{$buscar}%")
                    ->orWhere('cedula', 'like', "%{$buscar}%")
                    ->orWhere('licencia', 'like', "%{$buscar}%");
            }))
            ->orderBy($orden, $direccion)->paginate(10)->withQueryString();
        return view('conductores.lista', compact('conductores', 'buscar', 'orden', 'direccion'));
    }

    public function create() { return view('conductores.crear', ['socios' => Socio::orderBy('nombres')->get()]); }

    public function store(Request $request)
    {
        Conductor::create($this->validar($request));
        return redirect()->route('conductores.index')->with('success', 'Conductor registrado correctamente.');
    }

    public function show(Conductor $conductore) { return redirect()->route('conductores.edit', $conductore); }

    public function edit(Conductor $conductore)
    {
        return view('conductores.editar', ['conductor' => $conductore, 'socios' => Socio::orderBy('nombres')->get()]);
    }

    public function update(Request $request, Conductor $conductore)
    {
        $conductore->update($this->validar($request, $conductore->id));
        return redirect()->route('conductores.index')->with('success', 'Conductor actualizado correctamente.');
    }

    public function destroy(Conductor $conductore)
    {
        $conductore->delete();
        return redirect()->route('conductores.index')->with('success', 'Conductor eliminado correctamente.');
    }

    private function validar(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'socio_id' => ['required', 'exists:socios,id'],
            'nombres' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'cedula' => ['required', 'digits:10', 'unique:conductors,cedula'.($id ? ",{$id}" : '')],
            'licencia' => ['required', 'string', 'max:50'],
            'telefono' => ['required', 'string', 'max:15'],
            'estado' => ['required', 'in:Activo,Inactivo'],
        ]);
    }
}
