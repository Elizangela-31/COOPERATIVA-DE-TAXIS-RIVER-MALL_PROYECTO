<form class="row g-2 align-items-center mb-4" method="GET">
    <div class="col-lg-5">
        <div class="input-group">
            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
            <input class="form-control" name="buscar" value="<?php echo e($buscar ?? ''); ?>" placeholder="<?php echo e($placeholder); ?>">
        </div>
    </div>
    <div class="col-sm-auto">
        <select class="form-select" name="orden" aria-label="Ordenar registros">
            <?php $__currentLoopData = $opcionesOrden; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor => $etiqueta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($valor); ?>" <?php if(($orden ?? '') === $valor): echo 'selected'; endif; ?>><?php echo e($etiqueta); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-sm-auto">
        <select class="form-select" name="direccion" aria-label="Dirección del orden">
            <option value="asc" <?php if(($direccion ?? '') === 'asc'): echo 'selected'; endif; ?>>Ascendente</option>
            <option value="desc" <?php if(($direccion ?? 'desc') === 'desc'): echo 'selected'; endif; ?>>Descendente</option>
        </select>
    </div>
    <div class="col-auto">
        <button class="btn btn-primary" type="submit"><i class="bi bi-funnel me-1"></i> Aplicar</button>
    </div>
    <?php if(request()->filled('buscar') || request()->filled('orden')): ?>
        <div class="col-auto">
            <a class="btn btn-light" href="<?php echo e(url()->current()); ?>" title="Limpiar filtros"><i class="bi bi-x-lg"></i></a>
        </div>
    <?php endif; ?>
</form>
<?php /**PATH C:\Xampp\htdocs\COOPERATIVA\resources\views/componentes/buscador.blade.php ENDPATH**/ ?>