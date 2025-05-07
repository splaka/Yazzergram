<?= $this->extend('main_template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-center mb-4"><?= esc($topic['titolo']) ?></h1>
    <p class="text-muted text-center">Postato da: <?= esc($topic['username']) ?></p>
    <hr>

    <h3 class="mb-4">Posts:</h3>
    <?php if (!empty($posts)): ?>
        <div class="list-group">
            <?php foreach ($posts as $post): ?>
                <div class="list-group-item mb-3 shadow-sm">
                    <p class="mb-1"><?= esc($post['testo']) ?></p>
                    <small class="text-muted">Posted by: <?= esc($post['username']) ?></small>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-muted">No posts available for this topic.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>

