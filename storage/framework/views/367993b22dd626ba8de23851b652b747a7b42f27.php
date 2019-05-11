

<?php $__env->startSection('title', 'Historico de movimentações'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Historico de movimentações </h1>

    <ol class="breadcrumb"> 
        <li> <a href=""></a> Dashboard  </li>
        <li> <a href="">Historico de movimentações</a> </li>

    </ol> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="box">
        <div class="box-header">

        <form action="<?php echo e(route('historic.search')); ?>" method="POST" class="form form-inline" >
        <?php echo csrf_field(); ?> <!-- Todo formulario que usa o metodo POST precisa de um tokem para validar o envio, <?php echo csrf_field(); ?> faz com que o token não fique visivel para o usuario  -->
            <input type="text" name="id" class="form-control" placeholder="ID" >
            <input type="date" name="date" class="form-control" >
           
           
            <select name="type" class="form-control">
            <option value="">--Selecione o tipo-- </option>
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($type); ?>"> <?php echo e($type); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select> 
            
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
                
        </div>
        
        <div class="box-body">
       
            <table class="table table-bordered table-hover" > 
                <thead>
                     <tr>
                         <th>#</th>
                         <th>Valor</th>
                         <th>Tipo</th>
                         <th>Data</th>
                         <th>Sender</th>
                     </tr>
                </thead>
                <tbody>
                    
                <?php $__empty_1 = true; $__currentLoopData = $historics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $historic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                     <tr>
                         <td><?php echo e($historic->id); ?></td>
                         <td><?php echo e(number_format($historic->amount,2,',','.')); ?></td>
                         <td><?php echo e($historic->type($historic->type)); ?></td>
                         <td><?php echo e($historic->date); ?></td>
                         <td>
                             
                             <?php if($historic->user_id_transaction): ?>
                                <?php echo e($historic->userSender->name); ?>

                             <?php endif; ?>   
                        </td>
                     </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
                
            </table>
                <?php echo $historics->links(); ?>

        
        </div>
                    
        
    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/vagrant/sites/arctic-pay/resources/views/admin/balance/historics.blade.php */ ?>