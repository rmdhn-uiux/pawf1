<?= $this->extend($config->viewLayout) ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card-custom shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-extrabold">Daftar <span class="text-primary">Akun</span></h2>
                        <p class="text-muted">Buat akun baru untuk mulai menulis</p>
                    </div>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold small text-uppercase"><?= lang('Auth.email') ?></label>
                            <input type="email" class="form-control form-custom <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" placeholder="Masukkan email" value="<?= old('email') ?>">
                            <div class="invalid-feedback"><?= session('errors.email') ?></div>
                        </div>

                        <div class="mb-4">
                            <label for="username" class="form-label fw-bold small text-uppercase"><?= lang('Auth.username') ?></label>
                            <input type="text" class="form-control form-custom <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                   name="username" placeholder="Masukkan username" value="<?= old('username') ?>">
                            <div class="invalid-feedback"><?= session('errors.username') ?></div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold small text-uppercase"><?= lang('Auth.password') ?></label>
                            <input type="password" name="password" class="form-control form-custom <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Masukkan password">
                            <div class="invalid-feedback"><?= session('errors.password') ?></div>
                        </div>

                        <div class="mb-4">
                            <label for="pass_confirm" class="form-label fw-bold small text-uppercase"><?= lang('Auth.repeatPassword') ?></label>
                            <input type="password" name="pass_confirm" class="form-control form-custom <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="Ulangi password">
                            <div class="invalid-feedback"><?= session('errors.pass_confirm') ?></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill fw-bold shadow-sm mb-3">
                            <i class="fas fa-user-plus me-2"></i><?= lang('Auth.register') ?>
                        </button>

                        <hr class="my-4">

                        <p class="text-center mb-0">
                            <?= lang('Auth.alreadyRegistered') ?>
                            <a href="<?= url_to('login') ?>" class="fw-bold text-decoration-none"><?= lang('Auth.signIn') ?></a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
