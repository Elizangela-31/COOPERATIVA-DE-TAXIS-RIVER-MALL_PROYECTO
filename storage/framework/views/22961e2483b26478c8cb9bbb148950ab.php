<?php $__env->startSection('titulo','Nuevo socio | River Mall'); ?> <?php $__env->startSection('encabezado','Nuevo socio'); ?>
<?php $__env->startSection('contenido'); ?>
<div class="page-heading mb-4"><h1 class="h3 mb-1">Registrar socio</h1><p class="mb-0">Complete la información del nuevo propietario.</p></div>
<div class="card"><div class="card-body p-4 p-lg-5"><form action="<?php echo e(route('socios.store')); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo $__env->make('socios._formulario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></form></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\COOPERATIVA\resources\views/socios/crear.blade.php ENDPATH**/ ?>