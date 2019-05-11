<?php if($errors->any()): ?>
            <div class="alert alert-warning">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

<?php if(session('success')): ?>
           
            <div class="alert alert-success">
                    <p><?php echo e(session('success')); ?></p>
            </div>

<?php endif; ?>

<?php if(session('error')): ?>
           
            <div class="alert alert-warning">
                    <p><?php echo e(session('error')); ?></p>
            </div>
    
<?php endif; ?>
<?php /* /home/vagrant/sites/arctic-pay/resources/views/admin/includes/alert.blade.php */ ?>