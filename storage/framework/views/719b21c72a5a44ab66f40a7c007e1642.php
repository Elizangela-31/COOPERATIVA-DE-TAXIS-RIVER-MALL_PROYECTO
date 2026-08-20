<?php $__env->startSection('titulo', 'Panel principal | River Mall'); ?>
<?php $__env->startSection('encabezado', 'Resumen general'); ?>

<?php $__env->startSection('contenido'); ?>
<div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="h3 mb-1">Panel principal</h1>
        <p class="text-muted mb-0">Bienvenido al sistema de gestión de la Cooperativa River Mall.</p>
    </div>
    <span class="badge text-bg-light p-2">
        <i class="bi bi-calendar3 me-1"></i> <?php echo e(now()->format('d/m/Y')); ?>

    </span>
</div>

<div class="row g-4 mb-4">
<?php $__currentLoopData = [
    ['Socios', $totalSocios, 'bi-people-fill', 'primary', 'socios.index'],
    ['Conductores', $totalConductores, 'bi-person-vcard-fill', 'success', 'conductores.index'],
    ['Taxis', $totalTaxis, 'bi-taxi-front-fill', 'warning', 'taxis.index'],
    ['Clientes', $totalClientes, 'bi-person-hearts', 'info', 'clientes.index'],
    ['Servicios', $totalServicios, 'bi-geo-alt-fill', 'danger', 'servicios.index'],
    ['Recaudación', '$ '.number_format($totalPagos, 2), 'bi-cash-coin', 'dark', 'pagos.index']
]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$titulo, $valor, $icono, $color, $ruta]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-6 col-xl-4">
        <a href="<?php echo e(route($ruta)); ?>" class="text-decoration-none">
            <div class="card stat-card h-100">
                <div class="card-body d-flex justify-content-between align-items-center p-4">
                    <div>
                        <div class="text-muted mb-1"><?php echo e($titulo); ?></div>
                        <div class="h3 mb-0 text-dark"><?php echo e($valor); ?></div>
                    </div>
                    <div class="stat-icon bg-<?php echo e($color); ?> bg-opacity-10 text-<?php echo e($color); ?>">
                        <i class="bi <?php echo e($icono); ?>"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <strong><i class="bi bi-clock-history me-2"></i>Servicios recientes</strong>
        <a href="<?php echo e(route('servicios.index')); ?>" class="small text-decoration-none">Ver todos</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Ruta</th>
                    <th>Taxi</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $ultimosServicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e(optional($servicio->fecha)->format('d/m/Y')); ?></td>
                        <td><?php echo e($servicio->cliente?->nombres); ?> <?php echo e($servicio->cliente?->apellidos); ?></td>
                        <td><?php echo e($servicio->origen); ?> → <?php echo e($servicio->destino); ?></td>
                        <td><?php echo e($servicio->taxi?->placa); ?></td>
                        <td><span class="badge text-bg-secondary"><?php echo e($servicio->estado); ?></span></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Todavía no hay servicios registrados.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\COOPERATIVA\resources\views/panel/lista.blade.php ENDPATH**/ ?>