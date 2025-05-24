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
                <div class="list-group-item mb-3 shadow-sm position-relative">
                    <?php if (session()->get('username') === $post['username']): ?>
                        <form action="<?= site_url('post/delete/' . $post['id_post']) ?>" method="POST" class="position-absolute top-0 end-0 m-2">
                            <button type="submit" class="btn btn-sm btn-close" aria-label="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo post?')"></button>
                        </form>
                    <?php endif; ?>
                    <p class="fw-bold fs-5 mb-1"><?= esc($post['username']) ?></p>
                    <small><?= esc($post['data_ora']) ?></small>
                    <hr class="my-2">
                    <p class="mb-0"><?= esc($post['testo']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-muted">Non ci sono post per questo topic.</p>
    <?php endif; ?>
    <div class="d-flex justify-content-center mt-4">
        <?= $pager->links('default', 'bootstrap_simple') ?>
    </div>
    <?php if (session()->get('logged_in')): ?>
        <div>
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form action="<?= current_url() ?>" method="POST" class="mt-4">
                <div class="mb-3">
                    <label for="testo" class="form-label">Scrivi un nuovo post:</label>
                    <textarea class="form-control" id="testo" name="testo" rows="3" required placeholder="Inserisci il tuo post..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    <?php endif; ?>
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
</div>

<?= $this->endSection() ?>