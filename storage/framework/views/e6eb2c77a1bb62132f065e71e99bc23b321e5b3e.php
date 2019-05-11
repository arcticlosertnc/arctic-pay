

<?php $__env->startSection('title', 'Saldo'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Saldo</h1>

    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Saldo</a> </li>

    </ol> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="box">
        <div class="box-header">
                    
                <a href="<?php echo e(route('balance.deposit')); ?>" class ="btn btn-primary"><i class="fa fa-arrow-circle-right"></i></i> Recarga</a>
                    <?php if($amount >0): ?> 
                        <a href="<?php echo e(route('balance.whichdraw')); ?>" class ="btn btn-danger" ><i class="fa fa-arrow-circle-left"></i>     Saque</a>
                        <a href="<?php echo e(route('balance.transfer')); ?>" class ="btn btn-warning" ><i class="fa fa-exchange"></i> Transferencia</a>
                    
                    <?php endif; ?>
        </div>
        <div class="box-body">
        <?php echo $__env->make('admin.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>          
                <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>R$ <?php echo e(number_format($amount , 2 ,'.', '')); ?></h3>

                        <p>Saldo do usuario</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">Historico <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                    
        
    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/vagrant/sites/arctic-pay/resources/views/admin/balance/index.blade.php */ ?>