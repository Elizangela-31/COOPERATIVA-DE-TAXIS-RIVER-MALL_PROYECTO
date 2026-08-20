<form class="row g-2 align-items-center mb-4" method="GET">
    <div class="col-lg-5">
        <div class="input-group">
            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
            <input class="form-control" name="buscar" value="{{ $buscar ?? '' }}" placeholder="{{ $placeholder }}">
        </div>
    </div>
    <div class="col-sm-auto">
        <select class="form-select" name="orden" aria-label="Ordenar registros">
            @foreach($opcionesOrden as $valor => $etiqueta)
                <option value="{{ $valor }}" @selected(($orden ?? '') === $valor)>{{ $etiqueta }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-auto">
        <select class="form-select" name="direccion" aria-label="Dirección del orden">
            <option value="asc" @selected(($direccion ?? '') === 'asc')>Ascendente</option>
            <option value="desc" @selected(($direccion ?? 'desc') === 'desc')>Descendente</option>
        </select>
    </div>
    <div class="col-auto">
        <button class="btn btn-primary" type="submit"><i class="bi bi-funnel me-1"></i> Aplicar</button>
    </div>
    @if(request()->filled('buscar') || request()->filled('orden'))
        <div class="col-auto">
            <a class="btn btn-light" href="{{ url()->current() }}" title="Limpiar filtros"><i class="bi bi-x-lg"></i></a>
        </div>
    @endif
</form>
