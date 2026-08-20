@extends('plantillas.principal')
@section('encabezado','Editar taxi')
@section('contenido')<div class="card shadow-sm"><div class="card-body p-4"><h1 class="h4 mb-4">Editar taxi</h1><form method="POST" action="{{ route('taxis.update',$taxi) }}">@csrf @method('PUT') @include('taxis._formulario')</form></div></div>@endsection
