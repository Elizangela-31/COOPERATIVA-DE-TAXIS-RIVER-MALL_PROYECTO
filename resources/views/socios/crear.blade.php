@extends('plantillas.principal')
@section('titulo','Nuevo socio | River Mall') @section('encabezado','Nuevo socio')
@section('contenido')
<div class="page-heading mb-4"><h1 class="h3 mb-1">Registrar socio</h1><p class="mb-0">Complete la información del nuevo propietario.</p></div>
<div class="card"><div class="card-body p-4 p-lg-5"><form action="{{ route('socios.store') }}" method="POST">@csrf @include('socios._formulario')</form></div></div>
@endsection
