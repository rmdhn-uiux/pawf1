<?php if (session()->has('message')) : ?>
    <div class="alert-flash alert-flash-success mb-4 shadow-sm">
        <i class="fas fa-check-circle"></i>
        <span><?= session('message') ?></span>
    </div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <div class="alert-flash alert-flash-error mb-4 shadow-sm">
        <i class="fas fa-exclamation-circle"></i>
        <span><?= session('error') ?></span>
    </div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
    <div class="alert-flash alert-flash-error mb-4 shadow-sm">
        <i class="fas fa-exclamation-circle"></i>
        <div>
            <strong class="d-block mb-1">Terjadi kesalahan:</strong>
            <ul class="mb-0 ps-3">
                <?php foreach (session('errors') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
<?php endif ?>
