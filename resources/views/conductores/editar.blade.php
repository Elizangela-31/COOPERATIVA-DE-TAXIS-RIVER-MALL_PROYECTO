@extends('plantillas.principal')
@section('encabezado','Editar conductor')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Editar conductor</h1><form method="POST" action="{{ route('conductores.update',$conductor) }}">@csrf @method('PUT') @include('conductores._formulario')</form></div></div>@endsection
