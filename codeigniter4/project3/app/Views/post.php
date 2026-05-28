<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center shadow-lg hero-section-sm">
    <div class="container">
        <h1 class="display-4 fw-extrabold mb-2">Daftar Blog</h1>
        <p class="lead mb-0 opacity-90">Jelajahi kumpulan artikel dan tutorial terbaru dari komunitas kami.</p>
    </div>
</div>

<div class="container my-5">
    <!-- Search Bar -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="" method="get">
                <div class="input-group shadow-sm rounded-pill overflow-hidden bg-white p-1">
                    <input type="text" name="keyword" class="form-control border-0 px-4" placeholder="Cari artikel menarik..." value="<?= service('request')->getGet('keyword') ?>">
                    <button class="btn btn-primary rounded-pill px-4 fw-bold" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Category Filter -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <a href="<?= base_url('post') ?>" class="btn <?= empty($selected_category) ? 'btn-primary' : 'btn-light' ?> rounded-pill px-4 fw-bold">
                    Semua
                </a>
                <?php foreach ($categories as $cat) : ?>
                    <a href="<?= base_url('post?category=' . $cat['slug']) ?>" class="btn <?= $selected_category === $cat['slug'] ? 'btn-primary' : 'btn-light' ?> rounded-pill px-4 fw-bold">
                        <?= esc($cat['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <?php if (empty($posts)) : ?>
            <div class="col-12 text-center py-5">
                <div class="card-custom bg-light py-5">
                    <div class="card-body">
                        <i class="fas fa-search fa-3x text-muted mb-3 opacity-50"></i>
                        <h4 class="fw-bold">Tidak ada hasil ditemukan</h4>
                        <p class="text-muted mb-4">Maaf, kami tidak menemukan artikel dengan kriteria tersebut.</p>
                        <a href="<?= base_url('post') ?>" class="btn btn-primary rounded-pill px-4 fw-bold">Kembali ke Daftar Blog</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <?php foreach ($posts as $post) : ?>
                <div class="col-md-4">
                    <article class="card-custom h-100 shadow-sm">
                        <?php if (!empty($post['post_image'])) : ?>
                            <img src="<?= base_url('uploads/post/' . $post['post_image']) ?>" class="card-img-top" alt="<?= esc($post['title']) ?>" style="height: 200px; object-fit: cover;">
                        <?php else : ?>
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x text-muted opacity-25"></i>
                            </div>
                        <?php endif; ?>

                        <div class="card-body p-4 d-flex flex-column">
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <span class="badge-category"><?= esc($post['category_name'] ?? 'General') ?></span>
                                <small class="text-muted"><i class="far fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($post['created_at'] ?? 'now')) ?></small>
                            </div>
                            
                            <h5 class="card-title fw-bold mb-3 lh-base">
                                <a href="<?= base_url('post/' . $post['slug']) ?>" class="text-decoration-none text-dark stretched-link hover-primary">
                                    <?= esc($post['title']) ?>
                                </a>
                            </h5>
                            
                            <p class="card-text text-muted mb-4 small flex-grow-1">
                                <?= esc(substr(strip_tags($post['content']), 0, 100)) ?>...
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top mt-auto">
                                <span class="small fw-bold text-dark"><i class="far fa-user me-1 text-primary"></i> <?= esc($post['author'] ?? 'Admin') ?></span>
                                <div class="z-2">
                                    <?php if (logged_in()) : ?>
                                        <a href="<?= base_url('admin/post/' . $post['id'] . '/edit') ?>" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-bold">Edit</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <?= $pager->links('post', 'bootstrap_pagination') ?>
    </div>
</div>

<?= $this->endSection() ?>
