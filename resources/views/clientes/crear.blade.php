@extends('plantillas.principal')
@section('encabezado','Nuevo cliente')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Registrar cliente</h1><form method="POST" action="{{ route('clientes.store') }}">@csrf @include('clientes._formulario')</form></div></div>@endsection
