@extends('plantillas.principal')
@section('encabezado','Nuevo pago')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Registrar pago</h1><form method="POST" action="{{ route('pagos.store') }}">@csrf @include('pagos._formulario')</form></div></div>@endsection
