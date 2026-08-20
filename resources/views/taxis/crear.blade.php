@extends('plantillas.principal')
@section('encabezado','Nuevo taxi')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Registrar taxi</h1><form method="POST" action="{{ route('taxis.store') }}">@csrf @include('taxis._formulario')</form></div></div>@endsection
