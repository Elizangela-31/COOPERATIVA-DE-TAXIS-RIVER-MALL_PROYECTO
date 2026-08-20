<?php if($errors->any()): ?>
    <div class="alert alert-danger border-0 shadow-sm" role="alert">
        <div class="d-flex gap-3">
            <i class="bi bi-exclamation-octagon-fill fs-5"></i>
            <div>
                <strong>Revise la información ingresada</strong>
                <ul class="mb-0 mt-1 ps-3">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Xampp\htdocs\COOPERATIVA\resources\views/componentes/errores.blade.php ENDPATH**/ ?>