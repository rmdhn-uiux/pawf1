<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-section text-center shadow-lg">
    <div class="container">
        <h1 class="display-3 fw-extrabold mb-3">Tentang <span class="text-warning">Kami</span></h1>
        <p class="lead mb-0 opacity-90">Mengenal lebih dekat visi, misi, dan tim di balik TechnoDaily.</p>
    </div>
</div>

<div class="container my-5 pt-4">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="pe-lg-5">
                <h2 class="fw-extrabold mb-4">Membangun Masa Depan <span class="text-primary">Teknologi</span></h2>
                <p class="text-muted fs-5 mb-4">TechnoDaily lahir dari semangat untuk berbagi pengetahuan berkualitas bagi para developer di seluruh Indonesia. Kami percaya bahwa setiap baris kode memiliki potensi untuk mengubah dunia.</p>
                <div class="row g-4 mt-2">
                    <div class="col-6">
                        <div class="stat-card border-start border-4 border-primary">
                            <h3 class="fw-bold mb-1">500+</h3>
                            <p class="text-muted small mb-0">Artikel Tutorial</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card border-start border-4 border-warning">
                            <h3 class="fw-bold mb-1">10k+</h3>
                            <p class="text-muted small mb-0">Pembaca Bulanan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="position-relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Team Work" class="img-fluid rounded-5 shadow-lg">
                <div class="position-absolute bottom-0 start-0 bg-primary text-white p-4 rounded-4 shadow-lg m-3 d-none d-md-block" style="max-width: 250px;">
                    <p class="mb-0 fw-bold">"Inovasi datang dari keinginan untuk berbagi."</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-5">
        <div class="col-md-4">
            <div class="card-custom h-100 shadow-sm">
                <div class="card-body p-5">
                    <div class="bg-primary-soft rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px; background-color: rgba(99, 102, 241, 0.1);">
                        <i class="fas fa-rocket fa-lg text-primary"></i>
                    </div>
                    <h5 class="fw-extrabold mb-3 text-dark">Visi Kami</h5>
                    <p class="text-muted mb-0">Menjadi pusat referensi pemrograman terpercaya yang dapat diakses oleh siapa saja, di mana saja.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-custom h-100 shadow-sm">
                <div class="card-body p-5">
                    <div class="bg-warning-soft rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px; background-color: rgba(255, 193, 7, 0.1);">
                        <i class="fas fa-bullseye fa-lg text-warning"></i>
                    </div>
                    <h5 class="fw-extrabold mb-3 text-dark">Misi Kami</h5>
                    <p class="text-muted mb-0">Menyediakan konten berkualitas tinggi yang dapat membantu developer Indonesia mengembangkan skill programming mereka.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-custom h-100 shadow-sm">
                <div class="card-body p-5">
                    <div class="bg-dark-soft rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px; background-color: rgba(17, 24, 39, 0.05);">
                        <i class="fas fa-hand-holding-heart fa-lg text-dark"></i>
                    </div>
                    <h5 class="fw-extrabold mb-3 text-dark">Nilai Kami</h5>
                    <p class="text-muted mb-0">Kolaborasi, inovasi, dan integritas adalah fondasi utama dalam setiap konten yang kami sajikan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
