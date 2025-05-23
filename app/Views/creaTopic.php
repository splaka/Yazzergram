<?= $this->extend('main_template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Crea un nuovo Topic</h4>
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

                    <form action="<?= site_url('/topic/creaTopic') ?>" method="post">
                        <div class="mb-3">
                            <label for="titolo" class="form-label">Titolo del Topic:</label>
                            <input type="text" class="form-control" id="titolo" name="titolo" value="<?= old('titolo') ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Crea Topic</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>