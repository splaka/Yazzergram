 <?= $this->extend('main_template') ?>
 <?= $this->section('content') ?>

 <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
     <div class="container-fluid">
         <a class="navbar-brand" href="#">
             <img src="img/logo.svg" alt="Bootstrap" style="height: 10vh;">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link" href="#">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Iscriviti</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Accedi</a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>

 <div class="container text-center">
     <div class="row">
         <div class="col-2">

         </div>
         <div class="col-8">
             <h1>Discussioni:</h1>
             <div class="card card-body mb-3" style="text-align: left;">
                 <?php foreach ($topics as $topic): ?>
                     <a href="#">
                         <h3><?= esc($topic['titolo']) ?></h3>
                     </a>
                     <h5><?= esc($topic['username']) ?></h5>
                 <?php endforeach; ?>
             </div>
         </div>
         <div class="col-2">

         </div>
     </div>
 </div>
 <?= $this->endSection() ?>