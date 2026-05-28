<?= $this->extend($config->viewLayout) ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card-custom shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-extrabold">Selamat <span class="text-primary">Datang</span></h2>
                        <p class="text-muted">Silakan masuk ke akun Anda</p>
                    </div>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= url_to('login') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-4">
                            <label for="login" class="form-label fw-bold small text-uppercase"><?= lang('Auth.emailOrUsername') ?></label>
                            <input type="text" class="form-control form-custom <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                   name="login" placeholder="Masukkan email atau username" value="<?= old('login') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold small text-uppercase"><?= lang('Auth.password') ?></label>
                            <input type="password" name="password" class="form-control form-custom <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Masukkan password">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <?php if ($config->allowRemembering): ?>
                            <div class="mb-4 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                <label class="form-check-label fw-bold small" for="remember"><?= lang('Auth.rememberMe') ?></label>
                            </div>
                        <?php endif; ?>

                        <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill fw-bold shadow-sm mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i><?= lang('Auth.loginAction') ?>
                        </button>

                        <hr class="my-4">

                        <div class="text-center">
                            <?php if ($config->allowRegistration) : ?>
                                <p class="mb-2"><a href="<?= url_to('register') ?>" class="fw-bold text-decoration-none"><?= lang('Auth.needAnAccount') ?></a></p>
                            <?php endif; ?>
                            <?php if ($config->activeResetter): ?>
                                <p class="mb-0"><a href="<?= url_to('forgot') ?>" class="text-muted text-decoration-none small"><?= lang('Auth.forgotYourPassword') ?></a></p>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
