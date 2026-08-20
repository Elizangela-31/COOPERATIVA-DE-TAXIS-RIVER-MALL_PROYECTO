@extends('plantillas.principal')
@section('encabezado','Nuevo conductor')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Registrar conductor</h1><form method="POST" action="{{ route('conductores.store') }}">@csrf @include('conductores._formulario')</form></div></div>@endsection
