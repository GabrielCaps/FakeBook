<nav class="shadow navbar navbar-expand-lg bg-white navbar-light border-bottom p-0 mb-2 sticky-top">
  <div class="container-fluid">
    <div class="nav-item fs-3">
      <a href="/home" class="text-decoration-none text-dark nav-link">FakeBook</a>
    </div>

<?php if(auth()->user()): ?>

    <form class="d-flex me-5">
        <input class="placeholder-sm border-0 bg-light rounded-pill form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
      </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon fs-1"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end w-25" id="navbarText">
      <ul class="navbar-nav mb-2 fs-3">
        <li class="nav-item justify-content-end d-flex me-3">
          <a class="placeholder nav-link" aria-current="page" href="#"><i class="bi bi-chat-quote-fill"></i></a>
        </li>
        <li class="nav-item justify-content-end d-flex me-3">
          <a class="placeholder nav-link" href="<?php echo e(route ('user.show', ['id' => Auth::user()->id ])); ?>"><i class="bi bi-person-fill"></i></a>
        </li>
        <li class="nav-item justify-content-end d-flex me-3">
          <form action="<?php echo e(route('logout')); ?>" method="POST">
            <button class="btn nav-link" type="submit"><i class="bi bi-box-arrow-left"></i></button>
            <?php echo csrf_field(); ?>
          </form>
        </li>
      </ul>
    </div>
  </div>
<?php endif; ?>  
</nav><?php /**PATH /home/gabriel/Área de Trabalho/Treino2/resources/views/components/navbar.blade.php ENDPATH**/ ?>