@extends('plantillas.principal')
@section('encabezado','Editar servicio')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Editar servicio</h1><form method="POST" action="{{ route('servicios.update',$servicio) }}">@csrf @method('PUT') @include('servicios._formulario')</form></div></div>@endsection
