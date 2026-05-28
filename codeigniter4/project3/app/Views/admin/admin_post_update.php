<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="hero-section text-center shadow-lg hero-section-sm">
    <div class="container">
        <h1 class="display-4 fw-extrabold mb-2">Edit Artikel</h1>
        <p class="lead mb-0 opacity-90">Perbarui konten Anda agar tetap relevan dan menarik bagi pembaca.</p>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card-custom shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <?php if (isset($validation)): ?>
                        <div class="alert-flash alert-flash-error mb-4 shadow-sm">
                            <i class="fas fa-exclamation-circle"></i>
                            <div>
                                <strong class="d-block mb-1">Mohon perbaiki kesalahan berikut:</strong>
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row g-4">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label for="title" class="form-label fw-bold text-dark">Judul Artikel</label>
                                    <input type="text" name="title" class="form-control form-custom form-control-lg" id="title" placeholder="Masukkan judul..." required value="<?= old('title', $post['title']) ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="content" class="form-label fw-bold text-dark">Konten Artikel</label>
                                    <textarea name="content" class="form-control form-custom" id="content" rows="12" placeholder="Tuliskan isi artikel..." required><?= old('content', $post['content']) ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-light p-4 rounded-4 h-100">
                                    <div class="mb-4">
                                        <label for="category_id" class="form-label fw-bold text-dark small text-uppercase">Kategori</label>
                                        <select name="category_id" id="category_id" class="form-select form-custom" required>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category['id'] ?>" <?= (old('category_id', $post['category_id']) == $category['id']) ? 'selected' : '' ?>>
                                                    <?= esc($category['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-4 text-center">
                                        <label class="form-label fw-bold text-dark small text-uppercase d-block mb-3">Gambar Saat Ini</label>
                                        <?php if ($post['post_image']): ?>
                                            <div class="mb-3 rounded-3 overflow-hidden shadow-sm">
                                                <img src="<?= base_url('uploads/post/' . $post['post_image']) ?>" alt="Post Image" class="img-fluid w-100" style="max-height: 200px; object-fit: cover;">
                                            </div>
                                        <?php else: ?>
                                            <div class="bg-white p-4 text-center rounded-3 shadow-sm mb-3">
                                                <i class="fas fa-image fa-2x text-muted opacity-25"></i>
                                                <p class="small text-muted mt-2 mb-0">Belum ada gambar</p>
                                            </div>
                                        <?php endif; ?>
                                        <input type="file" name="post_image" id="post_image" class="form-control form-custom" accept="image/*">
                                        <small class="text-muted d-block mt-2">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fw-bold text-dark small text-uppercase">Tags</label>
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <?php foreach ($tags as $tag): ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag_<?= $tag['id'] ?>" value="<?= $tag['id'] ?>" <?= in_array($tag['id'], $post_tags) ? 'checked' : '' ?>>
                                                    <label class="form-check-label small" for="tag_<?= $tag['id'] ?>"><?= esc($tag['name']) ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-bold text-dark small text-uppercase d-block mb-3">Status Publikasi</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_published" value="published" <?= $post['status'] === 'published' ? 'checked' : '' ?>>
                                            <label class="form-check-label fw-bold text-success" for="status_published">Publish</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status_draft" value="draft" <?= $post['status'] === 'draft' ? 'checked' : '' ?>>
                                            <label class="form-check-label fw-bold text-warning" for="status_draft">Draft</label>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">Perbarui Artikel</button>
                                        <a href="<?= base_url('admin/post') ?>" class="btn btn-light btn-lg rounded-pill fw-bold">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
