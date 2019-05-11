

<?php $__env->startSection('title', 'Saldo'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Saldo</h1>

    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Saldo</a> </li>

    </ol> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <p>Meu saldo...</p>
    <div class="box">
        <div class="box-header">
                    
                <a href="<?php echo e(route('balance.deposit')); ?>" class ="btn btn-primary"><i class="fa fa-arrow-circle-right"></i></i> Recarga</a>
                <a href="" class ="btn btn-danger" ><i class="fa fa-arrow-circle-left"></i>     Saque</a>
        </div>
        <div class="box-body">
              
                <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>R$ <?php echo e(number_format($amount , 2 ,'.', '')); ?></h3>

                        <p>Bounce Rate</p>
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
<?php /* /var/www/html/cursos/laravel-saldo/resources/views/admin/balance/index.blade.php */ ?>