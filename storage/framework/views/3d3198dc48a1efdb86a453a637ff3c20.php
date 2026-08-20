<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('titulo', 'Cooperativa River Mall'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/cooperativa.css')); ?>" rel="stylesheet">
</head>
<body>
<div class="sidebar-overlay" id="sidebarOverlay"></div>
<aside class="sidebar" id="sidebar">
    <div class="brand">
        <div class="brand-logo"><i class="bi bi-taxi-front-fill"></i></div>
        <div><strong>River Mall</strong><span>Gestión de taxis</span></div>
        <button class="btn-close btn-close-white ms-auto d-lg-none" id="cerrarMenu" aria-label="Cerrar menú"></button>
    </div>
    <nav class="sidebar-nav">
        <div class="menu-title">Resumen</div>
        <a href="<?php echo e(route('panel')); ?>" class="<?php echo e(request()->routeIs('panel') ? 'active' : ''); ?>"><i class="bi bi-grid-1x2-fill"></i><span>Panel principal</span></a>
        <div class="menu-title">Administración</div>
        <a href="<?php echo e(route('socios.index')); ?>" class="<?php echo e(request()->routeIs('socios.*') ? 'active' : ''); ?>"><i class="bi bi-people-fill"></i><span>Socios</span></a>
        <a href="<?php echo e(route('conductores.index')); ?>" class="<?php echo e(request()->routeIs('conductores.*') ? 'active' : ''); ?>"><i class="bi bi-person-vcard-fill"></i><span>Conductores</span></a>
        <a href="<?php echo e(route('taxis.index')); ?>" class="<?php echo e(request()->routeIs('taxis.*') ? 'active' : ''); ?>"><i class="bi bi-taxi-front-fill"></i><span>Taxis</span></a>
        <a href="<?php echo e(route('clientes.index')); ?>" class="<?php echo e(request()->routeIs('clientes.*') ? 'active' : ''); ?>"><i class="bi bi-person-lines-fill"></i><span>Clientes</span></a>
        <div class="menu-title">Operaciones</div>
        <a href="<?php echo e(route('servicios.index')); ?>" class="<?php echo e(request()->routeIs('servicios.*') ? 'active' : ''); ?>"><i class="bi bi-geo-alt-fill"></i><span>Servicios</span></a>
        <a href="<?php echo e(route('pagos.index')); ?>" class="<?php echo e(request()->routeIs('pagos.*') ? 'active' : ''); ?>"><i class="bi bi-cash-coin"></i><span>Pagos</span></a>
    </nav>
    <div class="sidebar-help"><i class="bi bi-shield-check"></i><div><strong>Sistema seguro</strong><span>Cooperativa River Mall</span></div></div>
</aside>

<div class="main">
    <header class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn menu-toggle d-lg-none" id="botonMenu" aria-label="Abrir menú"><i class="bi bi-list"></i></button>
            <div><h2><?php echo $__env->yieldContent('encabezado', 'Panel administrativo'); ?></h2><p>SYSTAX TECNOSOLUCIONES FHL S.A.S.</p></div>
        </div>
        <div class="dropdown">
            <button class="user-menu" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="user-avatar"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></span>
                <span class="d-none d-sm-block text-start"><strong><?php echo e(auth()->user()->name); ?></strong><small>Administrador</small></span>
                <i class="bi bi-chevron-down"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                <li><span class="dropdown-item-text small text-muted"><?php echo e(auth()->user()->email); ?></span></li>
                <li><hr class="dropdown-divider"></li>
                <li><form method="POST" action="<?php echo e(route('cerrar-sesion')); ?>"><?php echo csrf_field(); ?><button class="dropdown-item text-danger" type="submit"><i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión</button></form></li>
            </ul>
        </div>
    </header>

    <main class="page-content">
        <?php echo $__env->yieldContent('contenido'); ?>
    </main>
    <footer class="app-footer"><span>© <?php echo e(date('Y')); ?> Cooperativa River Mall</span><span>Sangolquí, Quito · Ecuador</span></footer>
</div>

<div class="page-loader" id="pageLoader"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div><span>Procesando información...</span></div>

<?php if(session('success') || session('error')): ?>
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="mensajeToast" class="toast border-0 shadow-lg text-bg-<?php echo e(session('success') ? 'success' : 'danger'); ?>" role="alert">
        <div class="d-flex"><div class="toast-body"><i class="bi <?php echo e(session('success') ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill'); ?> me-2"></i><?php echo e(session('success') ?? session('error')); ?></div><button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button></div>
    </div>
</div>
<?php endif; ?>

<div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content border-0 shadow"><div class="modal-body p-4 text-center">
        <div class="confirm-icon"><i class="bi bi-trash3"></i></div><h3 class="h5">¿Eliminar este registro?</h3>
        <p class="text-muted mb-4">Esta acción no se puede deshacer.</p>
        <div class="d-flex justify-content-center gap-2"><button class="btn btn-light" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-danger" id="confirmarEliminar">Sí, eliminar</button></div>
    </div></div></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar'), overlay = document.getElementById('sidebarOverlay');
    const alternarMenu = () => { sidebar.classList.toggle('show'); overlay.classList.toggle('show'); };
    document.getElementById('botonMenu')?.addEventListener('click', alternarMenu);
    document.getElementById('cerrarMenu')?.addEventListener('click', alternarMenu);
    overlay?.addEventListener('click', alternarMenu);
    const toast = document.getElementById('mensajeToast');
    if (toast) bootstrap.Toast.getOrCreateInstance(toast, {delay: 4500}).show();
    let formularioEliminar = null;
    document.querySelectorAll('form[data-confirmar-eliminar]').forEach(form => form.addEventListener('submit', event => {
        event.preventDefault(); formularioEliminar = form;
        bootstrap.Modal.getOrCreateInstance(document.getElementById('modalEliminar')).show();
    }));
    document.getElementById('confirmarEliminar')?.addEventListener('click', () => formularioEliminar?.submit());
    document.querySelectorAll('form:not([data-confirmar-eliminar])').forEach(form => form.addEventListener('submit', () => {
        if (form.checkValidity()) document.getElementById('pageLoader').classList.add('show');
    }));
});
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Xampp\htdocs\COOPERATIVA\resources\views/plantillas/principal.blade.php ENDPATH**/ ?>