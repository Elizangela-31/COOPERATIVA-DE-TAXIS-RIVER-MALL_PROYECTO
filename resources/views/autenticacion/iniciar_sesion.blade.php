<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | Cooperativa River Mall</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/cooperativa.css') }}" rel="stylesheet">
</head>
<body class="login-page">
<main class="login-shell">
    <section class="login-visual">
        <div class="login-mark"><i class="bi bi-taxi-front-fill"></i></div>
        <span class="text-uppercase small fw-bold opacity-75 mb-2">Movilidad y servicio</span>
        <h1>Cooperativa<br>River Mall</h1>
        <p class="mb-0 opacity-75">Plataforma integral para la administración eficiente de socios, unidades y servicios de transporte.</p>
    </section>
    <section class="login-form">
        <div class="mb-4"><span class="badge text-bg-primary mb-3">Acceso administrativo</span><h2 class="h3 mb-2">Bienvenido</h2><p class="text-muted">Ingrese sus credenciales para continuar.</p></div>
        @include('componentes.errores')
        <form method="POST" action="{{ route('iniciar-sesion.guardar') }}" id="formularioLogin">
            @csrf
            <div class="mb-3"><label for="email" class="form-label">Correo electrónico</label><div class="input-group"><span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span><input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="administrador@rivermall.com" required autofocus autocomplete="email"></div></div>
            <div class="mb-3"><label for="password" class="form-label">Contraseña</label><div class="input-group"><span class="input-group-text bg-white"><i class="bi bi-lock"></i></span><input id="password" type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required autocomplete="current-password"><button class="btn btn-outline-secondary" type="button" id="mostrarContrasena" aria-label="Mostrar contraseña"><i class="bi bi-eye"></i></button></div></div>
            <div class="form-check mb-4"><input class="form-check-input" type="checkbox" name="remember" id="remember"><label class="form-check-label" for="remember">Mantener mi sesión iniciada</label></div>
            <button class="btn btn-primary btn-login w-100" type="submit"><span class="texto-boton"><i class="bi bi-box-arrow-in-right me-1"></i> Ingresar al sistema</span><span class="cargando-boton d-none"><span class="spinner-border spinner-border-sm me-2"></span>Ingresando...</span></button>
        </form>
        <div class="text-center text-muted small mt-4"><i class="bi bi-shield-check me-1"></i> Acceso protegido y seguro</div>
    </section>
</main>
<script>
document.getElementById('mostrarContrasena').addEventListener('click', function(){const campo=document.getElementById('password'),mostrar=campo.type==='password';campo.type=mostrar?'text':'password';this.querySelector('i').className=mostrar?'bi bi-eye-slash':'bi bi-eye';});
document.getElementById('formularioLogin').addEventListener('submit',function(){if(this.checkValidity()){document.querySelector('.texto-boton').classList.add('d-none');document.querySelector('.cargando-boton').classList.remove('d-none');}});
</script>
</body></html>
