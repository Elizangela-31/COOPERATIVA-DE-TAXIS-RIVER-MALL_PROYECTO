@extends('plantillas.principal')
@section('titulo','Socios | River Mall')
@section('encabezado','Gestión de socios')
@section('contenido')
<div class="page-heading d-flex flex-wrap justify-content-between gap-3 mb-4"><div><h1 class="h3 mb-1">Socios</h1><p class="mb-0">Administre los propietarios registrados en la cooperativa.</p></div><a class="btn btn-primary align-self-center" href="{{ route('socios.create') }}"><i class="bi bi-plus-lg me-1"></i> Nuevo socio</a></div>
<div class="card"><div class="card-body p-4">
@include('componentes.buscador',['placeholder'=>'Buscar por nombre o cédula','opcionesOrden'=>['created_at'=>'Más recientes','nombres'=>'Nombres','apellidos'=>'Apellidos','cedula'=>'Cédula','estado'=>'Estado']])
<div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Socio</th><th>Cédula</th><th>Contacto</th><th>Dirección</th><th>Estado</th><th class="text-end">Acciones</th></tr></thead><tbody>
@forelse($socios as $socio)<tr><td><strong>{{ $socio->nombres }} {{ $socio->apellidos }}</strong><small class="d-block text-muted">Registro #{{ $socio->id }}</small></td><td>{{ $socio->cedula }}</td><td>{{ $socio->telefono }}<small class="d-block text-muted">{{ $socio->correo ?: 'Sin correo registrado' }}</small></td><td>{{ $socio->direccion }}</td><td><span class="badge text-bg-{{ $socio->estado==='Activo'?'success':'secondary' }}">{{ $socio->estado }}</span></td><td class="text-end text-nowrap"><a class="btn btn-sm btn-light" href="{{ route('socios.edit',$socio) }}" title="Editar"><i class="bi bi-pencil-square"></i></a> <form class="d-inline" method="POST" action="{{ route('socios.destroy',$socio) }}" data-confirmar-eliminar>@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash3"></i></button></form></td></tr>
@empty<tr><td colspan="6" class="text-center py-5 text-muted"><i class="bi bi-inbox fs-2 d-block mb-2"></i>No existen socios registrados.</td></tr>@endforelse
</tbody></table></div><div class="d-flex justify-content-end">{{ $socios->links() }}</div></div></div>
@endsection
