<?= $this->extend('main_template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Discussioni:</h1>
    <div class="row g-4">
        <?php if (session()->get('logged_in')): ?>
            <div class="col-md-6 col-lg-4">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <a href="<?= site_url('topic/creaTopic') ?>" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 64px; height: 64px; font-size: 2rem;">
                        <span class="visually-hidden">Crea un nuovo topic</span>
                        <!-- // SVG per il simbolo del "+", lo ha trovato l'IA non so da dove viene -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php foreach ($topics as $topic): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100 position-relative">
                    <?php if (session()->get('username') === $topic['username']): ?>
                        <form action="<?= site_url('topic/delete/' . $topic['id_topic']) ?>" method="POST" class="position-absolute top-0 end-0 m-2">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-sm btn-close" aria-label="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo topic?')"></button>
                        </form>
                    <?php endif; ?>
                    <div class="card-body">
                        <a href="<?= site_url('topic/' . $topic['id_topic']) ?>" class="text-decoration-none text-dark">
                            <h5 class="card-title"><?= esc($topic['titolo']) ?></h5>
                        </a>
                        <p class="card-text text-muted">Autore: <?= esc($topic['username']) ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="<?= "topic/{$topic['id_topic']}" ?>" class="btn btn-primary btn-sm">Leggi topic</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <?= $pager->links('default', 'bootstrap_simple') ?>
    </div>
</div>


<?php if (session()->getFlashdata('success')): ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div class="toast align-items-center text-bg-primary border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= session()->getFlashdata('success') ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php elseif (session()->getFlashdata('error')): ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= session()->getFlashdata('error') ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>