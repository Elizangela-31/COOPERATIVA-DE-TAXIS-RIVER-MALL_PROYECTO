@extends('plantillas.principal')
@section('encabezado','Editar pago')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Editar pago</h1><form method="POST" action="{{ route('pagos.update',$pago) }}">@csrf @method('PUT') @include('pagos._formulario')</form></div></div>@endsection
