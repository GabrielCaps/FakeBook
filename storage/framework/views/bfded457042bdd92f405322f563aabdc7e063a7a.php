


<?php $__currentLoopData = $Posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<p> <?php echo e($Post->content); ?> </p>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/gabriel/Área de Trabalho/Treino/resources/views/teste.blade.php ENDPATH**/ ?>