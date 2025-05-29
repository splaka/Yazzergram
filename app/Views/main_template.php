<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Yazzergram</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src=<?= base_url("/img/logo.svg") ?> alt="Bootstrap" style="height: 7.5vh;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href=<?= site_url() ?>>Home</a>
                    </li>
                    <?php if (session()->get('logged_in')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= site_url("/profilo") ?>>Profilo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= site_url("/logout") ?>>Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= site_url("/signup") ?>>Iscriviti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= site_url("/login") ?>>Accedi</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="flex-grow-1">
        <?= $this->renderSection('content') ?>
    </main>

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

    <footer class="bg-dark text-light text-center py-3 mt-5">
        <div class="container">
            <small>&copy; <?= date('Y') ?> Yazzergram. Tutti i diritti riservati.</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>