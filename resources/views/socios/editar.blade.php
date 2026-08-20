@extends('plantillas.principal')
@section('titulo','Editar socio | River Mall') @section('encabezado','Editar socio')
@section('contenido')
<div class="page-heading mb-4"><h1 class="h3 mb-1">Editar socio</h1><p class="mb-0">Actualice la información de {{ $socio->nombres }} {{ $socio->apellidos }}.</p></div>
<div class="card"><div class="card-body p-4 p-lg-5"><form action="{{ route('socios.update',$socio) }}" method="POST">@csrf @method('PUT') @include('socios._formulario')</form></div></div>
@endsection
