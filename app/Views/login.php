<?= $this->extend('main_template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Accedi</h4>
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

                    <form action=<?= base_url("/login") ?> method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="login" class="form-label">Email</label>
                            <input type="text" class="form-control" id="login" name="email" value="<?= old('email') ?>" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Accedi</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Non hai un account? <a href=<?= base_url("/signup") ?>>Registrati</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>