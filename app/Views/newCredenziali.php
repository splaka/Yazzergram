<?= $this->extend('main_template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Cambia Credenziali</h4>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= esc(session()->getFlashdata('success')) ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= current_url() ?>" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nuovo Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= old('username') !== null ? old('username') : ($user['username'] ?? '') ?>" required placeholder="Inserisci nuovo username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Nuova Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') !== null ? old('email') : ($user['email'] ?? '') ?>" required placeholder="Inserisci nuova email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Nuova Password <small class="text-muted">(Lascia vuoto per non cambiare)</small></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nuova password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Conferma Nuova Password</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Conferma nuova password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Aggiorna Credenziali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
