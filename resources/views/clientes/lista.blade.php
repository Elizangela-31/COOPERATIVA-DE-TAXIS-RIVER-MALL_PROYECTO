@extends('plantillas.principal')
@section('titulo','Clientes | River Mall') @section('encabezado','Gestión de clientes')
@section('contenido')
<div class="page-heading d-flex flex-wrap justify-content-between gap-3 mb-4"><div><h1 class="h3 mb-1">Clientes</h1><p class="mb-0">Personas que solicitan los servicios de transporte.</p></div><a class="btn btn-primary align-self-center" href="{{ route('clientes.create') }}"><i class="bi bi-plus-lg me-1"></i> Nuevo cliente</a></div>
<div class="card"><div class="card-body p-4">@include('componentes.buscador',['placeholder'=>'Buscar por nombre o cédula','opcionesOrden'=>['created_at'=>'Más recientes','nombres'=>'Nombres','apellidos'=>'Apellidos','cedula'=>'Cédula']])
<div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Cliente</th><th>Cédula</th><th>Teléfono</th><th>Dirección</th><th>Correo</th><th class="text-end">Acciones</th></tr></thead><tbody>
@forelse($clientes as $cliente)<tr><td><strong>{{ $cliente->nombres }} {{ $cliente->apellidos }}</strong></td><td>{{ $cliente->cedula }}</td><td>{{ $cliente->telefono }}</td><td>{{ $cliente->direccion }}</td><td>{{ $cliente->correo ?: '—' }}</td><td class="text-end text-nowrap"><a class="btn btn-sm btn-light" href="{{ route('clientes.edit',$cliente) }}" title="Editar"><i class="bi bi-pencil-square"></i></a> <form class="d-inline" method="POST" action="{{ route('clientes.destroy',$cliente) }}" data-confirmar-eliminar>@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash3"></i></button></form></td></tr>
@empty<tr><td colspan="6" class="text-center py-5 text-muted"><i class="bi bi-inbox fs-2 d-block mb-2"></i>No existen clientes registrados.</td></tr>@endforelse
</tbody></table></div><div class="d-flex justify-content-end">{{ $clientes->links() }}</div></div></div>
@endsection
