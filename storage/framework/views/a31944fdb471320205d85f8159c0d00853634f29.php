

<?php $__env->startSection('title', 'Nova Retirada'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Fazer Retirada</h1>
    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Saldo</a> </li>

    </ol> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="box">
        <div class="box-header" >
           
        </div>
    
        <div class="box-body">
            <?php echo $__env->make('admin.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form method="POST" action="<?php echo e(route('whichdraw.store')); ?>">
            <?php echo csrf_field(); ?>

                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor Recarga" class="form-control">
                </div>
                
                <div class="form-group">
                        <button type="submit" class="btn btn-danger"> Saque </button>
                </div>
            
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/html/cursos/arctic-pay/resources/views/admin/balance/whichdraw.blade.php */ ?>