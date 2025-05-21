<?= $this->extend('main_template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-center mb-4"><?= esc($topic['titolo']) ?></h1>
    <p class="text-muted text-center">Autore: <?= esc($topic['username']) ?></p>
    <hr>

    <h3 class="mb-4">Posts:</h3>
    <?php if (!empty($posts)): ?>
        <div class="list-group">
            <?php foreach ($posts as $post): ?>
                <div class="list-group-item mb-3 shadow-sm">
                    <p class="fw-bold fs-5 mb-1"><?= esc($post['username']) ?></p>
                    <small><?= esc($post['data_ora']) ?></small>
                    <hr class="my-2">
                    <p class="mb-0"><?= esc($post['testo']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <?= $pager->links('default', 'bootstrap_simple') ?>
        </div>
    <?php else: ?>
        <p class="text-center text-muted">Non ci sono post per questo topic.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>