<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->string('buscar')->trim();
        $orden = in_array($request->orden, ['nombres', 'apellidos', 'cedula', 'estado', 'created_at'], true)
            ? $request->orden : 'created_at';
        $direccion = $request->direccion === 'asc' ? 'asc' : 'desc';
        $socios = Socio::when($buscar->isNotEmpty(), fn ($q) => $q->where(function ($sub) use ($buscar) {
            $sub->where('nombres', 'like', "%{$buscar}%")
                ->orWhere('apellidos', 'like', "%{$buscar}%")
                ->orWhere('cedula', 'like', "%{$buscar}%");
        }))->orderBy($orden, $direccion)->paginate(10)->withQueryString();

        return view('socios.lista', compact('socios', 'buscar', 'orden', 'direccion'));
    }

    public function create() { return view('socios.crear'); }
    public function store(Request $request) { Socio::create($this->validar($request)); return redirect()->route('socios.index')->with('success', 'Socio registrado correctamente.'); }
    public function show(Socio $socio) { return redirect()->route('socios.edit', $socio); }
    public function edit(Socio $socio) { return view('socios.editar', compact('socio')); }
    public function update(Request $request, Socio $socio) { $socio->update($this->validar($request, $socio->id)); return redirect()->route('socios.index')->with('success', 'Socio actualizado correctamente.'); }
    public function destroy(Socio $socio) { $socio->delete(); return redirect()->route('socios.index')->with('success', 'Socio eliminado correctamente.'); }

    private function validar(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'nombres' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'cedula' => ['required', 'digits:10', 'unique:socios,cedula'.($id ? ",{$id}" : '')],
            'telefono' => ['required', 'string', 'max:15'],
            'direccion' => ['required', 'string', 'max:255'],
            'correo' => ['nullable', 'email', 'max:150'],
            'estado' => ['required', 'in:Activo,Inactivo'],
        ]);
    }
}
