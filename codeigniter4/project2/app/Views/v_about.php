<?= $this->extend('layouts/template-home'); ?>
<?= $this->section('content'); ?>

<main class="main">
  <section id="about" class="about section">

      <!-- Judul Bagian -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="<?= base_url('assets/img/gambar2.jpeg') ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 content">
            <h2>Data Engineer</h2>
            <p class="fst-italic py-3">
              Passionate Data Engineer with a strong foundation in building scalable data pipelines, optimizing database performance, and ensuring data integrity.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>26 Oktober 2005</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>085774462810</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Tangerang Selatan</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>21</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Bachelor</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>ramadhananton26@gmail.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                </ul>
              </div>
            </div>
            <p class="py-3">
              Dedicated to architecting and maintaining robust data infrastructures that empower organizations to leverage their data effectively. My expertise includes designing efficient ETL processes, managing data warehousing solutions, and implementing complex data transformations. I am committed to delivering high-quality, reliable data solutions that support data-driven decision-making.
            </p>
          </div>
        </div>

      </div>

    </section>
    
</main>

<?= $this->endSection(); ?>