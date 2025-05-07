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
                        <p class="card-text text-muted">Postato da: <?= esc($topic['username']) ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="<?="topic/{$topic['id_topic']}"?>" class="btn btn-primary btn-sm">Leggi topic</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>