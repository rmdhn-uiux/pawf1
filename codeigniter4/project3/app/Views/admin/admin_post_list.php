<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="hero-section text-center shadow-lg hero-section-sm">
    <div class="container">
        <h1 class="display-4 fw-extrabold mb-2">Admin Panel</h1>
        <p class="lead mb-0 opacity-90">Kelola artikel, kategori, dan konten blog Anda di sini.</p>
    </div>
</div>

<div class="container my-5">
    <div class="section-header">
        <div>
            <h2>Daftar <span class="text-primary">Artikel</span></h2>
            <p>Total artikel yang terdaftar dalam sistem.</p>
        </div>
        <a href="<?= base_url('admin/post/new') ?>" class="btn btn-primary btn-lg rounded-pill px-4 fw-bold shadow">
            <i class="fas fa-plus me-2"></i> Buat Artikel Baru
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert-flash alert-flash-success mb-4 shadow-sm" role="alert">
            <i class="fas fa-check-circle"></i>
            <span><?= session()->getFlashdata('success') ?></span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card-custom shadow-sm">
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Gambar</th>
                        <th>Informasi Artikel</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($posts)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="fas fa-file-alt fa-2x text-muted opacity-25 mb-2"></i>
                                <p class="text-muted mb-0">Belum ada artikel yang dibuat.</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td class="ps-4" style="width: 90px;">
                                    <?php if ($post['post_image']): ?>
                                        <img src="<?= base_url('uploads/post/' . $post['post_image']) ?>" alt="<?= $post['title'] ?>" class="rounded-3 shadow-sm" style="width: 70px; height: 50px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded-3" style="width: 70px; height: 50px;">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= esc($post['title']) ?></div>
                                    <small class="text-muted"><i class="far fa-clock me-1"></i> <?= date('d M Y', strtotime($post['created_at'] ?? 'now')) ?></small>
                                </td>
                                <td>
                                    <span class="badge-category"><?= esc($post['category_name'] ?? 'General') ?></span>
                                </td>
                                <td>
                                    <?php if ($post['status'] === 'published'): ?>
                                        <span class="badge-published"><i class="fas fa-check-circle me-1"></i> Published</span>
                                    <?php else: ?>
                                        <span class="badge-draft"><i class="fas fa-pen me-1"></i> Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm rounded-circle shadow-sm" type="button" data-bs-toggle="dropdown" style="width: 35px; height: 35px;">
                                            <i class="fas fa-ellipsis-v text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3">
                                            <li><a class="dropdown-item py-2" href="<?= base_url('admin/post/' . $post['id'] . '/preview') ?>" target="_blank"><i class="fas fa-eye me-2 text-primary"></i> Preview</a></li>
                                            <li><a class="dropdown-item py-2" href="<?= base_url('admin/post/' . $post['id'] . '/edit') ?>"><i class="fas fa-edit me-2 text-warning"></i> Edit</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="<?= base_url('admin/post/' . $post['id'] . '/delete') ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="dropdown-item py-2 text-danger"><i class="fas fa-trash-alt me-2"></i> Hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
