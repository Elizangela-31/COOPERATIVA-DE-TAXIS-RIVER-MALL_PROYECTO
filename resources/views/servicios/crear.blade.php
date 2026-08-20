@extends('plantillas.principal')
@section('encabezado','Nuevo servicio')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Registrar servicio</h1><form method="POST" action="{{ route('servicios.store') }}">@csrf @include('servicios._formulario')</form></div></div>@endsection
