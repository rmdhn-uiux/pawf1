<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center shadow-lg">
    <div class="container">
        <h1 class="display-3 fw-extrabold mb-3">Hubungi <span class="text-warning">Kami</span></h1>
        <p class="lead mb-0 opacity-90">Punya pertanyaan atau ingin bekerjasama? Kami siap mendengarkan.</p>
    </div>
</div>

<div class="container my-5 pt-4">
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

    <div class="row g-5">
        <!-- Contact Info -->
        <div class="col-lg-4">
            <h3 class="fw-extrabold mb-4">Informasi <span class="text-primary">Kontak</span></h3>
            <p class="text-muted mb-5">Jangan ragu untuk menghubungi kami melalui saluran di bawah ini. Kami akan berusaha membalas pesan Anda secepat mungkin.</p>
            
            <div class="d-flex mb-4">
                <div class="flex-shrink-0">
                    <div class="bg-primary text-white rounded-4 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="fw-bold mb-1">Alamat Kantor</h6>
                    <p class="text-muted small">Jl. Teknologi No. 123, Lt. 5, Jakarta Selatan, 12345</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <div class="flex-shrink-0">
                    <div class="bg-success text-white rounded-4 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="fw-bold mb-1">Email Resmi</h6>
                    <p class="text-muted small">halo@myblog.id</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <div class="flex-shrink-0">
                    <div class="bg-warning text-white rounded-4 d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px;">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="fw-bold mb-1">Telepon & WhatsApp</h6>
                    <p class="text-muted small">+62 812-3456-7890</p>
                </div>
            </div>

            <hr class="my-5">
            
            <h6 class="fw-bold mb-3">Ikuti Kami</h6>
            <div class="d-flex gap-2">
                <a href="#" class="btn btn-light rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;"><i class="fab fa-facebook-f text-primary"></i></a>
                <a href="#" class="btn btn-light rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;"><i class="fab fa-twitter text-info"></i></a>
                <a href="#" class="btn btn-light rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;"><i class="fab fa-instagram text-danger"></i></a>
                <a href="#" class="btn btn-light rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;"><i class="fab fa-linkedin-in text-primary"></i></a>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-8">
            <div class="card-custom shadow-lg">
                <div class="card-body p-5">
                    <h4 class="fw-extrabold mb-4">Kirimkan <span class="text-primary">Pesan</span></h4>
                    <form action="<?= base_url('contact/send') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control form-custom" placeholder="Contoh: Andi Wijaya" value="<?= old('name') ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small">Alamat Email</label>
                                <input type="email" name="email" class="form-control form-custom" placeholder="Contoh: andi@email.com" value="<?= old('email') ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Subjek Pesan</label>
                            <input type="text" name="subject" class="form-control form-custom" placeholder="Apa yang ingin Anda bicarakan?" value="<?= old('subject') ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold small">Isi Pesan</label>
                            <textarea name="message" class="form-control form-custom" rows="5" placeholder="Tuliskan pesan detail Anda di sini..." required><?= old('message') ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold shadow">
                            Kirim Pesan Sekarang <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
