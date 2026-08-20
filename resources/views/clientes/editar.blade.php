@extends('plantillas.principal')
@section('encabezado','Editar cliente')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Editar cliente</h1><form method="POST" action="{{ route('clientes.update',$cliente) }}">@csrf @method('PUT') @include('clientes._formulario')</form></div></div>@endsection
