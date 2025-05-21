<?= $this->extend('main_template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Discussioni:</h1>
    <div class="row g-4">
        <?php foreach ($topics as $topic): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <a href="<?= site_url('topic/' . $topic['id_topic']) ?>" class="text-decoration-none text-dark">
                            <h5 class="card-title"><?= esc($topic['titolo']) ?></h5>
                        </a>
                        <p class="card-text text-muted">Autore: <?= esc($topic['username']) ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="<?="topic/{$topic['id_topic']}"?>" class="btn btn-primary btn-sm">Leggi topic</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="position-fixed bottom-0 text-bg-danger end-0 p-3" style="z-index: 9999">
    <div id="testToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            This is a test toast message!
        </div>
    </div>
</div>

<?= $this->endSection() ?>