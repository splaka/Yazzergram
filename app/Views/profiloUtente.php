<?= $this->extend('main_template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Profilo Utente</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h5 class="mt-2"><?= esc($user['username']) ?></h5>
                        <p class="text-muted mb-0">Email: <?= esc($user['email']) ?></p>
                    </div>
                    <hr>
                    <?php if (session()->get('user_id') == $user['id_user']): ?>
                        <h6>Gestione Account:</h6>
                        <a href="<?= site_url('/eliminaProfilo') ?>" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Sei sicuro di voler eliminare il tuo profilo?')">Elimina Profilo</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
