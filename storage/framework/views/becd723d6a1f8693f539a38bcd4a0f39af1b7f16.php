<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bem vindo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
</head>
<body class="bg-light">
	<nav class="shadow navbar navbar-expand-lg bg-white navbar-light border-bottom p-2 mb-4">
	  <div class="container-fluid">
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarText">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-3">
	        <li class="nav-item me-4">
	          <a class="nav-link" href="/">FaceHots</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

<?php echo $__env->yieldContent('content'); ?>


	
</body>
</html><?php /**PATH /home/gabriel/Área de Trabalho/Treino/resources/views/layout/welcome.blade.php ENDPATH**/ ?>