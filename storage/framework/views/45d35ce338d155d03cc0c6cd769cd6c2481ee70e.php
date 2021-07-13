
<?php $__currentLoopData = $Posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<div class="shadow col-md-8 row fs-5 mt-5 p-3 bg-white rounded">

				<div class="col-md-12 pb-4">	
					<div class="row">
						<div class="col-2">
							<img class="rounded-circle border border-2" src="<?php echo e(asset('img/No_photo.png')); ?>" alt="foto do perfil" width="70px" height="70px">
						</div>
						
						<div class="col-6 ms-3 fs-5">
							<strong>
								<a class="text-dark text-decoration-none" href="<?php echo e(route ('user.show', ['id' => $Post->user_id])); ?>"><?php echo e($Post->user->name); ?></a>
								<br>
								<sup><?php echo e(date('H:i', strtotime ($Post->updated_at))); ?> h</sup>
							</strong>
						</div>

	 					<?php if(Auth::user()->id == $Post->user_id): ?>

							<div class="col-3">
								<form action="<?php echo e(route('post.destroy', ['id' => $Post->id])); ?>" method="POST">
						    		<?php echo csrf_field(); ?>
						    		<?php echo method_field('DELETE'); ?>
						    		<button class="btn border rounded-pill shadow w-100 mb-2" type="submit">Apagar</button>
						    		<button class="btn border rounded-pill shadow w-100" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo e($Post->id); ?>" data-bs-whatever="@mdo">Editar</button>
						    	</form>
							</div>
						    	
						<?php endif; ?>

						<p class="mt-3 mb-0"><?php echo e($Post->content); ?></p>
					</div>
				</div>

				<hr>

			<?php if($Post->image == 'false'): ?>

			<?php else: ?>
			<a data-bs-toggle="modal" data-bs-target="#exampleModal2-<?php echo e($Post->id); ?>">
				<div class="mt-2 mb-3">
					<img src="/storage/app/<?php echo e($Post->image); ?>" alt="Foto da Postagem" width="100%">
				</div>
			</a>

				<hr>

			<?php endif; ?>
				<div class="col-md-12 row mb-2">
					<button class="border-0 col bg-white pb-2"><i class="bi bi-heart"></i> Amei</button>
					<button class="border-0 col bg-white pb-2"><i class="bi bi-share-fill"></i> Compartilhar</button>		
				</div>


				<div class="background-comment rounded p-2 border">


					<?php if($Comments->where('post_id', '=', $Post->id)): ?>
						<p class="m-0"><?php echo e($Comments->where('post_id', '=', $Post->id)->count()); ?> Comentários</p>
						<br>
					<?php endif; ?>

					<?php $__currentLoopData = $Comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($Post->id == $Comment->post_id): ?>

						<a href="<?php echo e(route ('user.show', ['id' => $Post->user_id])); ?>" class="fw-bold text-decoration-none text-dark"><?php echo e($Comment->user->name); ?></a>
						<p class="rounded-pill bg-light shadow p-1 mb-1"><?php echo e($Comment->content); ?></p>

					<div class="d-flex mb-2">

					<button class="btn">
						<span class="me-2 d-flex flex-column justify-content-center">
							<sub class="fw-bold mb-2"><?php echo e(date('H:i', strtotime ($Comment->updated_at))); ?> h</sub>
						</span>	
					</button>			

						<?php if(Auth::user()->id == $Comment->user_id): ?>
							<form action="<?php echo e(route('comment.destroy', ['id' => $Comment->id])); ?>" method="POST">
					    		<?php echo csrf_field(); ?>
					    		<?php echo method_field('DELETE'); ?>
					    		<button class="btn p-1" type="submit">Apagar</button>	
					    	</form>
						    
						    <button class="btn p-1 ms-2" data-bs-toggle="modal" data-bs-target="#commentModal-<?php echo e($Comment->id); ?>" data-bs-whatever="@mdo">Editar</button>	
						<?php endif; ?>

					</div>


					<?php if($Comments->where('post_id', '=', $Post->id)->count() > 2): ?>
						<?php break; ?>
					<?php endif; ?>

					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php if($Comments->where('post_id', '=', $Post->id)->count() > 2): ?>
							<a href="" class="text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal2-<?php echo e($Post->id); ?>">Ver mais</a>
						<?php endif; ?>

					<form action="<?php echo e(route ('comment.create')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<input type="hidden" name="post_id" value="<?php echo e($Post->id); ?>">
						<input class="rounded-pill shadow bg-white col-12" type="text" name="content" placeholder="Comente!">
					</form>

				</div>



		</div>
		
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/gabriel/Área de Trabalho/Treino/resources/views/components/post.blade.php ENDPATH**/ ?>