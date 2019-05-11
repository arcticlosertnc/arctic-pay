

<?php $__env->startSection('title', 'Nova transferencia'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Fazer transferencia </h1>
    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Saldo</a> </li>

    </ol> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="box">
        <div class="box-header" >
           <h3>Transferencia de saldo ( informe o destinatario )</h3>
        </div>
    
        <div class="box-body">
            <?php echo $__env->make('admin.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form method="POST" action="<?php echo e(route('confirm.transfer')); ?>">
            <?php echo csrf_field(); ?>

                <div class="form-group">
                    <input type="text" name="value" placeholder="Insira o email do destinatario" class="form-control">
                </div>
                
                <div class="form-group">
                        <button type="submit" class="btn btn-success"> Proxima etapa </button>
                </div>
            
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/html/cursos/arctic-pay/resources/views/admin/balance/transfer.blade.php */ ?>