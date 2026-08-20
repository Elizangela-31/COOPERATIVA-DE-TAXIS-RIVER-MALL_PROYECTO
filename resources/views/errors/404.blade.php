<!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Página no encontrada | River Mall</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"><link href="{{ asset('css/cooperativa.css') }}" rel="stylesheet"></head>
<body class="error-page"><main class="error-card text-center"><div class="error-icon"><i class="bi bi-signpost-split"></i></div><div class="display-3 fw-bold">404</div>
<h1 class="h3">Página no encontrada</h1><p class="text-muted">La dirección solicitada no existe o fue movida.</p>
<a class="btn btn-primary" href="{{ auth()->check() ? route('panel') : route('iniciar-sesion') }}"><i class="bi bi-house-door me-1"></i> Volver al inicio</a></main></body></html>
