

<?php if(auth()->user()): ?>
  	 <aside class="shadow col-md-2 col-sm-3 col-none bg-white border-end fs-5 p-0 position-fixed overflow-auto h-100">
  		<ul class="list-group overflow-auto p-2">
  			<li class="mb-3">
  				<a class='list-group-item list-group-item-dark list-group-item-action text-decoration-none text-dark' href='#'><?php echo e(__ ('Friends')); ?></a>
  			</li>
  			<li class="mb-3">
  				<a class='list-group-item list-group-item-dark list-group-item-action text-decoration-none text-dark' href='#'><?php echo e(__ ('Groups')); ?></a>
  			</li>
  			<li class="mb-3">
  				<a class='list-group-item list-group-item-dark list-group-item-action text-decoration-none text-dark' href='#'><?php echo e(__ ('Events')); ?></a>
  			</li>
  			<li class="mb-3">
  				<a class='list-group-item list-group-item-dark list-group-item-action text-decoration-none text-dark' href='#'><?php echo e(__ ('Teams')); ?></a>
  			</li>
  		</ul>
      
      <hr>
      <h5 class="text-center"><?php echo e(__ ('Chat')); ?></h5>

      <ul class="list-group background-comment">
        <li class="mb-3">
          <a class='list-group-item shadow-sm list-group-item-action text-decoration-none text-dark border-0' href='#'>Páginas</a>
        </li>
        <li class="mb-3">
          <a class='list-group-item shadow-sm list-group-item-action text-decoration-none text-dark border-0' href='#'>Páginas</a>
        </li>
        <li class="mb-3">
          <a class='list-group-item shadow-sm list-group-item-action text-decoration-none text-dark border-0' href='#'>Páginas</a>
        </li>
        <li class="mb-3">
          <a class='list-group-item shadow-sm list-group-item-action text-decoration-none text-dark border-0' href='#'>Páginas</a>
        </li>
        <li class="mb-3">
          <a class='list-group-item shadow-sm list-group-item-action text-decoration-none text-dark border-0' href='#'>Páginas</a>
        </li>
        <li class="mb-3">
          <a class='list-group-item shadow-sm list-group-item-action text-decoration-none text-dark border-0' href='#'>Páginas</a>
        </li>
      </ul>
      
  	</aside>
<?php endif; ?>
<?php /**PATH /home/gabriel/Área de Trabalho/Treino/resources/views/components/aside.blade.php ENDPATH**/ ?>