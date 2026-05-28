<?= $this->extend('layouts/template-home'); ?>
<?= $this->section('content'); ?>

  <main class="main">
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mx-auto" style="width: 30rem; border: 1px solid rgba(0,0,0,0.1) !important;">
                    <h3 class="card-header display-1 text-muted text-center" style="background-color: transparent; border-bottom: none;">
                        404
                    </h3>
                    <div class="card-body text-center">
                        <h4 class="card-title">Page Not Found</h4>
                        <p class="card-text">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                        <a href="<?= base_url('/') ?>" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>

<?= $this->endSection(); ?>
