<?php $__env->startSection('titulo', 'Início'); ?>

<?php $__env->startSection('content'); ?>

<div class="col-lg-9 mt-3 fs-5 overflow-auto row justify-content-center">
	<div class="container-fluid">
		<form class="row bg-white shadow rounded p-4" action="<?php echo e(route ('post.create', app()->getLocale())); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
			<?php echo csrf_field(); ?>
			<input class="placeholder border-1 col-md-12 rounded-pill shadow bg-white mt-1 p-2" type="text" name="content" placeholder="<?php echo e(__ ('Write')); ?>">
			<div class="col-md-6">
			  <input id="upload" type="file" name="image" class="placeholder-sm form-control shadow rounded-pill bg-white border-1 mt-3 mb-2">
			</div>
			<div class="w-100 d-flex justify-content-center">
				<img class="img-sm" id="img">
			</div>
				<hr class="mt-3">

<script>
const $ = document.querySelector.bind(document);
const previewImg = $('#img');
const fileChooser = $('#upload');

fileChooser.onchange = e => {
    const fileToUpload = e.target.files.item(0);
    const reader = new FileReader();

    // evento disparado quando o reader terminar de ler 
    reader.onload = e => previewImg.src = e.target.result;

    // solicita ao reader que leia o arquivo 
    // transformando-o para DataURL. 
    // Isso disparará o evento reader.onload.
    reader.readAsDataURL(fileToUpload);
};
    
</script>

			<div class="d-flex justify-content-center">
				<button class="shadow col-md-4 btn btn-primary mt-2" type="submit"><?php echo e(__ ('Create')); ?></button>
			</div>
		</form>
		<?php if(session('msg')): ?>
		 	<div class="row">
		 		<p class="col-md-12 text-center shadow mt-2 msg bg-info border-1 rounded-pill"><?php echo e(session('msg')); ?></p>
		 	</div>
	 	<?php endif; ?> 
	</div>


<?php $__currentLoopData = $Posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<div class="shadow col-lg-9 col-md-12 row fs-5 mt-5 p-0 bg-white rounded">

				<div class="col-md-12 p-3">	
					<div class="row">
						<div class="col-2">
							<img class="perfil rounded-circle border border-2" src="<?php echo e(asset('img/No_photo.png')); ?>" alt="foto do perfil">
						</div>
						
						<div class="col-6 ms-3 fs-5">
							<strong>
								<a class="text-dark text-decoration-none" href="<?php echo e(route ('user.show', ['id' => $Post->user_id], app()->getLocale())); ?>"><?php echo e($Post->user->name); ?></a>
								<br>
								<sup><?php echo e(date('H:i', strtotime ($Post->updated_at))); ?> h</sup>
							</strong>
						</div>

	 					<?php if(Auth::user()->id == $Post->user_id): ?>

							<div class="col-3">
								<form action="<?php echo e(route('post.destroy', ['id' => $Post->id], app()->getLocale())); ?>" method="POST">
						    		<?php echo csrf_field(); ?>
						    		<?php echo method_field('DELETE'); ?>
						    		<button class="placeholder-sm bg-white border rounded-pill shadow w-100 mb-2"><?php echo e(__ ('Delete')); ?></button>		    		
						    	</form>
						    	<button class="placeholder-sm bg-white border rounded-pill shadow w-100" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo e($Post->id); ?>" data-bs-whatever="@mdo"><?php echo e(__ ('Edit')); ?></button>
							</div>
						    	
						<?php endif; ?>

						<p class="mt-3 mb-0"><?php echo e($Post->content); ?></p>
					</div>
				</div>

				<hr>

			<?php if($Post->image == 'false'): ?>

			<?php else: ?>
			<a class="p-0" data-bs-toggle="modal" data-bs-target="#exampleModal2-<?php echo e($Post->id); ?>">
				<div class="mt-2 mb-3">
					<img src="/storage/app/<?php echo e($Post->image); ?>" alt="Foto da Postagem" width="100%">
				</div>
			</a>

				<hr>

			<?php endif; ?>
				<div class="col-md-12 row mb-2">
					<button class="border-0 col bg-white pb-2 placeholder-sm"><i class="bi bi-heart"></i> <?php echo e(__ ('Like')); ?></button>
					<button class="border-0 col bg-white pb-2 placeholder-sm"><i class="bi bi-share-fill"></i> <?php echo e(__ ('Share')); ?></button>		
				</div>


				<div class="background-comment rounded p-2 border">


					<?php if($Comments->where('post_id', '=', $Post->id)): ?>
						<p class="m-0"><?php echo e($Comments->where('post_id', '=', $Post->id)->count()); ?> <?php echo e(__ ('Comments')); ?></p>
						<br>
					<?php endif; ?>

					<div class="col-none">

					<?php $__currentLoopData = $Comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($Post->id == $Comment->post_id): ?>

						<a href="<?php echo e(route ('user.show', ['id' => $Post->user_id], app()->getLocale())); ?>" class="fw-bold text-decoration-none text-dark"><?php echo e($Comment->user->name); ?></a>
						<p class="rounded-pill bg-light shadow p-1 mb-1"><?php echo e($Comment->content); ?></p>

					<div class="d-flex mb-2">

					<button class="btn">
						<span class="me-2 d-flex flex-column justify-content-center">
							<sub class="fw-bold mb-2"><?php echo e(date('H:i', strtotime ($Comment->updated_at))); ?> h</sub>
						</span>	
					</button>			

						<?php if(Auth::user()->id == $Comment->user_id): ?>
							<form action="<?php echo e(route('comment.destroy', ['id' => $Comment->id], app()->getLocale())); ?>" method="POST">
					    		<?php echo csrf_field(); ?>
					    		<?php echo method_field('DELETE'); ?>
					    		<button class="btn p-1" type="submit"><?php echo e(__ ('Delete')); ?></button>	
					    	</form>
						    
						    <button class="btn p-1 ms-2" data-bs-toggle="modal" data-bs-target="#commentModal-<?php echo e($Comment->id); ?>" data-bs-whatever="@mdo"><?php echo e(__ ('Edit')); ?></button>	
						<?php endif; ?>

					</div>


					<?php if($Comments->where('post_id', '=', $Post->id)->count() > 2): ?>
						<?php break; ?>
					<?php endif; ?>

					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php if($Comments->where('post_id', '=', $Post->id)->count() > 2): ?>
							<a href="" class="text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal2-<?php echo e($Post->id); ?>"><?php echo e(__ ('Load More')); ?></a>
						<?php endif; ?>

					</div>
						<?php if($Comments->where('post_id', '=', $Post->id)->count() > 0): ?>
							<a href="" class="col-none-lg text-secondary text-decoration-none mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal2-<?php echo e($Post->id); ?>">Ver comentários</a>
						<?php endif; ?>


					<form action="<?php echo e(route ('comment.create'), app()->getLocale()); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<input type="hidden" name="post_id" value="<?php echo e($Post->id); ?>">
						<input class="placeholder p-1 rounded-pill shadow bg-white col-12" type="text" name="content" placeholder="<?php echo e(__ ('Write')); ?>">
					</form>

				</div>



	</div>

<!--Modals-->

								<div class="modal fade" id="exampleModal-<?php echo e($Post->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__ ('Edit')); ?></h5>
								        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								      </div>
								      <div class="modal-body">
								        <form class="row bg-white rounded p-4" action="<?php echo e(route ('post.edit', ['id' => $Post->id], app()->getLocale())); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
											<?php echo csrf_field(); ?>
											<input class="border-1 col-md-12 rounded-pill bg-white mt-1 p-1" type="text" name="content" placeholder="<?php echo e(__ ('Write')); ?>">
											<div class="col-md-6">
											  <input type="file" name="image" class="form-control rounded-pill bg-white border-1 mt-3 mb-2">
											</div>
											
											<button class="border-1 col-md-6 bg-white rounded-pill mt-3 mb-2">
												<i class="bi bi-emoji-smile"></i> Emojis</button>

												<hr>

											<div class="row mt-1 justify-content-around">
										        <button type="button" class="btn btn-secondary col-md-4" data-bs-dismiss="modal"><?php echo e(__ ('Close')); ?></button>
										        <button type="submit" class="btn btn-primary col-md-4"><?php echo e(__ ('Confirm')); ?></button>
										    </div>
										</form>
								      </div>
								    </div>
								  </div>
								</div>

								<div class="modal fade p-0" id="exampleModal2-<?php echo e($Post->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-fullscreen">
								    	<div class="modal-content">
											<div class="modal-body p-0">
											  <div class="container-fluid">
												    <div class="row vh-100">
												    	<div class="col-lg-9 d-flex align-items-center justify-content-center bg-dark p-0 mh-100">
												    		<?php if($Post->image != 'false'): ?>
											    			<img class="mw-100 mh-100" src="/storage/app/<?php echo e($Post->image); ?>">
											    				<?php else: ?>
											    				<h1 class="text-white"><?php echo e(__ ('no file selected')); ?></h1>
											    			<?php endif; ?>
												    	</div>
												    	<div class="col-lg-3 col-md-12 d-flex flex-column">
												    		<header class="modal-header justify-content-center">
												    			<h3><?php echo e(__ ('Comments')); ?></h3>
												    			<button type="button" class="p-4 col-none btn-close fixed-top" data-bs-dismiss="modal" aria-label="Close"></button>
												    		</header>
												    		
												    		<main class="modal-body overflow-auto">

												    		<?php $__currentLoopData = $Comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												    		<?php if($Post->id == $Comment->post_id): ?>
												    			<div class="d-flex justify-content-between">
													    			<a class="text-decoration-none text-dark fw-bold mt-2">
													    				<?php echo e($Comment->user->name); ?>

													    			</a>
														    			<?php if(Auth::user()->id == $Comment->user_id): ?>
																			<div class="d-flex">
																				<form action="<?php echo e(route('comment.destroy', ['id' => $Comment->id], app()->getLocale())); ?>" method="POST">
																		    		<?php echo csrf_field(); ?>
																		    		<?php echo method_field('DELETE'); ?>
																		    		<button class="placeholder-sm border-0 bg-transparent p-1 m-0" type="submit"><?php echo e(__ ('Delete')); ?></button>	
																		    	</form>
																			    
																			    <button class="placeholder-sm border-0 bg-transparent p-1 ms-2 mt-0" data-bs-toggle="modal" data-bs-target="#commentModal-<?php echo e($Comment->id); ?>" data-bs-whatever="@mdo"><?php echo e(__ ('Edit')); ?></button>	
																			</div>
																		<?php endif; ?>
																</div>
													    			<p class="bg-light bg-gradient rounded-pill p-2 m-0">
													    				<?php echo e($Comment->content); ?>

													    			</p>
												    		<?php endif; ?>
												    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				

												    		</main>
												    		
												    		<footer class="modal-footer d-flex justify-content-center">
												    			<form action="<?php echo e(route ('comment.create'), app()->getLocale()); ?>" method="POST">
												    				<?php echo csrf_field(); ?>
																	<input type="hidden" name="post_id" value="<?php echo e($Post->id); ?>">
																	<input class="placeholder p-1 rounded-pill shadow bg-white col-12" type="text" name="content" placeholder="<?php echo e(__ ('Write')); ?>">
												    			    <button type="button" class="btn btn-primary col-none-lg w-100 mt-2 rounded-pill" data-bs-dismiss="modal" aria-label="Close"><?php echo e(__ ('Close')); ?></button>
												    			</form>
												    		</footer>
												    	</div>
												    </div>
											  </div>
											</div>
										</div>
									</div>
								</div>

								<?php $__currentLoopData = $Comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="modal fade" id="commentModal-<?php echo e($Comment->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								
								  <div class="modal-dialog modal-dialog-centered">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__ ('Edit')); ?></h5>
								        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								      </div>
								      <div class="modal-body">
								        <form class="row bg-white rounded p-4" action="<?php echo e(route ('comment.edit', ['id' => $Comment->id], app()->getLocale())); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
											<?php echo csrf_field(); ?>
											<input class="border-1 col-md-12 rounded-pill bg-white mt-1 p-1 mb-2" type="text" name="content" placeholder="Editar comentário">
												<hr>

											<div class="row mt-1 justify-content-around">
										        <button type="button" class="btn btn-secondary col-md-4" data-bs-dismiss="modal"><?php echo e(__ ('Close')); ?></button>
										        <button type="submit" class="btn btn-primary col-md-4"><?php echo e(__ ('Confirm')); ?></button>
										    </div>
										</form>
								      </div>
								    </div>
								  </div>
								</div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="d-flex justify-content-center mt-3">
<?php echo e($Posts->links()); ?>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gabriel/Área de Trabalho/Treino/resources/views/dashboard.blade.php ENDPATH**/ ?>