<?= $this->extend($config->viewLayout) ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card-custom shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-extrabold">Lupa <span class="text-primary">Password</span></h2>
                        <p class="text-muted">Masukkan email untuk instruksi reset password</p>
                    </div>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= url_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold small text-uppercase"><?= lang('Auth.emailAddress') ?></label>
                            <input type="email" class="form-control form-custom <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" placeholder="Masukkan email Anda">
                            <div class="invalid-feedback"><?= session('errors.email') ?></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill fw-bold shadow-sm mb-3">
                            <i class="fas fa-paper-plane me-2"></i><?= lang('Auth.sendInstructions') ?>
                        </button>

                        <hr class="my-4">

                        <p class="text-center mb-0">
                            <a href="<?= url_to('login') ?>" class="fw-bold text-decoration-none">
                                <i class="fas fa-arrow-left me-1"></i>Kembali ke Login
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
