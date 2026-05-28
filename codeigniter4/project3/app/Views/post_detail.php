<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center shadow-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-white opacity-75 text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('post') ?>" class="text-white opacity-75 text-decoration-none">Blog</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page"><?= esc($post['title']) ?></li>
                    </ol>
                </nav>
                <h1 class="display-3 fw-extrabold mb-4"><?= esc($post['title']) ?></h1>
                <div class="d-flex justify-content-center align-items-center gap-3">
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill shadow-sm fw-bold">
                        <i class="far fa-user me-1"></i> <?= esc($post['author'] ?? 'Admin') ?>
                    </span>
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill shadow-sm fw-bold">
                        <i class="far fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($post['created_at'] ?? 'now')) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-n5 z-2">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <article class="card-custom shadow-lg">
                <div class="card-body p-4 p-md-5">
                    
                    <?php if (!empty($post['post_image'])) : ?>
                        <div class="mb-5 rounded-4 overflow-hidden shadow-sm">
                            <img src="<?= base_url('uploads/post/' . $post['post_image']) ?>" class="img-fluid w-100" alt="<?= esc($post['title']) ?>" style="max-height: 500px; object-fit: cover;">
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($tags)) : ?>
                        <div class="mb-4 d-flex flex-wrap gap-2">
                            <?php foreach ($tags as $tag) : ?>
                                <a href="<?= base_url('post?tag=' . $tag['slug']) ?>" class="badge-category text-decoration-none">
                                    <i class="fas fa-tag me-1"></i> <?= esc($tag['name']) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="content fs-5 text-dark mb-5" style="line-height: 1.8;">
                        <?= nl2br(esc($post['content'])) ?>
                    </div>

                    <div class="d-flex flex-wrap gap-2 pt-4 border-top">
                        <a href="<?= base_url('post') ?>" class="btn btn-soft-primary rounded-pill px-4 fw-bold">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Blog
                        </a>
                        <?php if (logged_in()) : ?>
                            <a href="<?= base_url('admin/post/' . $post['id'] . '/edit') ?>" class="btn btn-warning rounded-pill px-4 fw-bold">
                                <i class="fas fa-edit me-2"></i> Edit Artikel
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </article>

            <!-- Comments Section -->
            <section class="card-custom shadow-lg mt-4">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-extrabold mb-4">Komentar <span class="text-primary">(<?= count($comments) ?>)</span></h4>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert-flash alert-flash-success mb-4 shadow-sm" role="alert">
                            <i class="fas fa-check-circle"></i>
                            <span><?= session()->getFlashdata('success') ?></span>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert-flash alert-flash-error mb-4 shadow-sm" role="alert">
                            <i class="fas fa-exclamation-circle"></i>
                            <div>
                                <strong class="d-block mb-1">Terjadi kesalahan:</strong>
                                <ul class="mb-0 ps-3">
                                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($comments)) : ?>
                        <?php foreach ($comments as $comment) : ?>
                            <div class="d-flex mb-4 pb-4 border-bottom">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px;">
                                        <?= strtoupper(substr($comment['name'], 0, 1)) ?>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <h6 class="fw-bold mb-0"><?= esc($comment['name']) ?></h6>
                                        <small class="text-muted"><?= date('d M Y H:i', strtotime($comment['created_at'])) ?></small>
                                    </div>
                                    <p class="text-muted mb-0"><?= esc($comment['body']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="text-center py-4">
                            <i class="fas fa-comments fa-2x text-muted opacity-25 mb-2"></i>
                            <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                        </div>
                    <?php endif; ?>

                    <div class="mt-4 pt-4 border-top">
                        <h5 class="fw-bold mb-3">Tinggalkan Komentar</h5>
                        <form action="<?= base_url('post/' . $post['id'] . '/comment') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="post_slug" value="<?= $post['slug'] ?>">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control form-custom" placeholder="Nama Anda" value="<?= old('name') ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control form-custom" placeholder="Email Anda" value="<?= old('email') ?>" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="body" class="form-control form-custom" rows="4" placeholder="Tulis komentar Anda..." required><?= old('body') ?></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">Kirim Komentar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
