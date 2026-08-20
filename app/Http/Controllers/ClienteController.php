<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->string('buscar')->trim();
        $orden = in_array($request->orden, ['nombres', 'apellidos', 'cedula', 'created_at'], true)
            ? $request->orden : 'created_at';
        $direccion = $request->direccion === 'asc' ? 'asc' : 'desc';
        $clientes = Cliente::when($buscar->isNotEmpty(), fn ($q) => $q->where(function ($sub) use ($buscar) {
            $sub->where('nombres', 'like', "%{$buscar}%")->orWhere('apellidos', 'like', "%{$buscar}%")->orWhere('cedula', 'like', "%{$buscar}%");
        }))->orderBy($orden, $direccion)->paginate(10)->withQueryString();
        return view('clientes.lista', compact('clientes', 'buscar', 'orden', 'direccion'));
    }
    public function create() { return view('clientes.crear'); }
    public function store(Request $request) { Cliente::create($this->validar($request)); return redirect()->route('clientes.index')->with('success', 'Cliente registrado correctamente.'); }
    public function show(Cliente $cliente) { return redirect()->route('clientes.edit', $cliente); }
    public function edit(Cliente $cliente) { return view('clientes.editar', compact('cliente')); }
    public function update(Request $request, Cliente $cliente) { $cliente->update($this->validar($request, $cliente->id)); return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.'); }
    public function destroy(Cliente $cliente) { $cliente->delete(); return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.'); }
    private function validar(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'nombres' => ['required','string','max:100'], 'apellidos' => ['required','string','max:100'],
            'cedula' => ['required','digits:10','unique:clientes,cedula'.($id ? ",{$id}" : '')],
            'telefono' => ['required','string','max:15'], 'direccion' => ['required','string','max:255'],
            'correo' => ['nullable','email','max:150'],
        ]);
    }
}
