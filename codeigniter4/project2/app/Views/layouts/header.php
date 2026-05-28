<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Portfolio - iPortfolio Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- 
    BAGIAN: Favicons
    Deskripsi: Ikon yang muncul di tab browser dan shortcut mobile.
    Lokasi file: public/assets/img/
  -->
  <link href="<?= base_url('assets/img/favicon.png') ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- 
    BAGIAN: Fonts
    Deskripsi: Mengambil font dari Google Fonts (Roboto, Poppins, Raleway).
  -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- 
    BAGIAN: Vendor CSS Files
    Deskripsi: CSS dari library pihak ketiga seperti Bootstrap, AOS (Animation), Glightbox, dan Swiper.
    Lokasi file: public/assets/vendor/
  -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- 
    BAGIAN: Main CSS File
    Deskripsi: CSS utama untuk mengatur tampilan keseluruhan template.
    Lokasi file: public/assets/css/main.css
  -->
  <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">

</head>

<body class="index-page">

  <!-- 
    BAGIAN: Header / Sidebar
    Deskripsi: Berisi foto profil, nama, link sosial media, dan navigasi menu samping.
  -->
  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <!-- Foto Profil -->
    <div class="profile-img">
      <img src="<?= base_url('assets/img/gambar2.jpeg') ?>" alt="" class="img-fluid rounded-circle">
    </div>

    <!-- Nama / Logo -->
    <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center justify-content-center">
      <h1 class="sitename">Ramadhan Anton Pratama</h1>
    </a>

    <!-- Link Sosial Media -->
    <div class="social-links text-center">
      <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

    <!-- Language Switcher -->
    <div class="language-switcher text-center mb-3">
        <a href="<?= base_url('lang/id') ?>" class="btn btn-sm <?= service('request')->getLocale() == 'id' ? 'btn-primary' : 'btn-outline-primary' ?>">ID</a>
        <a href="<?= base_url('lang/en') ?>" class="btn btn-sm <?= service('request')->getLocale() == 'en' ? 'btn-primary' : 'btn-outline-primary' ?>">EN</a>
    </div>

    <!-- Menu Navigasi -->
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="<?= base_url('/') ?>"><i class="bi bi-house navicon"></i><?= lang('App.menu.home') ?></a></li>
        <li><a href="<?= base_url('about') ?>"><i class="bi bi-person navicon"></i> <?= lang('App.menu.about') ?></a></li>
        <li><a href="<?= base_url('resume') ?>"><i class="bi bi-file-earmark-text navicon"></i> <?= lang('App.menu.resume') ?></a></li>
        <li><a href="<?= base_url('portfolio') ?>"><i class="bi bi-images navicon"></i> <?= lang('App.menu.portfolio') ?></a></li>
        <li><a href="<?= base_url('services') ?>"><i class="bi bi-hdd-stack navicon"></i> <?= lang('App.menu.services') ?></a></li>
        <li><a href="<?= base_url('contact') ?>"><i class="bi bi-envelope navicon"></i> <?= lang('App.menu.contact') ?></a></li>
      </ul>
    </nav>

  </header>