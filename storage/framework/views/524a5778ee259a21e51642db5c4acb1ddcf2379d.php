

<?php $__env->startSection('title', 'Confirmação de transferencia'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Confirmação de transferencia</h1>
    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Saldo</a> </li>
        <li> <a href="">Transferir</a> </li>
        <li> <a href="">Confirmar transferencia</a> </li>

    </ol> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="box">
        <div class="box-header" >
           <h3>Confirmar transferencia de saldo </h3>
        </div>
    
        <div class="box-body">
            <?php echo $__env->make('admin.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <p><strong>Recebedor: </strong><?php echo e($sender->name); ?></p>
            <p><strong>Saldo Atual: </strong><?php echo e(number_format($balance->amount,2,',','.')); ?></p>

            <form method="POST" action="<?php echo e(route('transfer.store')); ?>">
                <?php echo csrf_field(); ?>


                <input type="hidden" name="sender_id" value="<?php echo e($sender->id); ?>">

                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor:" class="form-control">
                </div>
                
                <div class="form-group">
                        <button type="submit" class="btn btn-success"> Proxima etapa </button>
                </div>
            
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/html/cursos/arctic-pay/resources/views/admin/balance/transfer-confirm.blade.php */ ?>