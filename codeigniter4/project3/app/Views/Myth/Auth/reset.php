<?= $this->extend($config->viewLayout) ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card-custom shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-extrabold">Reset <span class="text-primary">Password</span></h2>
                        <p class="text-muted">Masukkan kode token dan password baru</p>
                    </div>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= url_to('reset-password') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-4">
                            <label for="token" class="form-label fw-bold small text-uppercase"><?= lang('Auth.token') ?></label>
                            <input type="text" class="form-control form-custom <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>"
                                   name="token" placeholder="Masukkan token" value="<?= old('token', $token ?? '') ?>">
                            <div class="invalid-feedback"><?= session('errors.token') ?></div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold small text-uppercase"><?= lang('Auth.email') ?></label>
                            <input type="email" class="form-control form-custom <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" placeholder="Masukkan email" value="<?= old('email') ?>">
                            <div class="invalid-feedback"><?= session('errors.email') ?></div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold small text-uppercase"><?= lang('Auth.newPassword') ?></label>
                            <input type="password" name="password" class="form-control form-custom <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Password baru">
                            <div class="invalid-feedback"><?= session('errors.password') ?></div>
                        </div>

                        <div class="mb-4">
                            <label for="pass_confirm" class="form-label fw-bold small text-uppercase"><?= lang('Auth.newPasswordRepeat') ?></label>
                            <input type="password" name="pass_confirm" class="form-control form-custom <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="Ulangi password baru">
                            <div class="invalid-feedback"><?= session('errors.pass_confirm') ?></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-lg rounded-pill fw-bold shadow-sm">
                            <i class="fas fa-key me-2"></i><?= lang('Auth.resetPassword') ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
