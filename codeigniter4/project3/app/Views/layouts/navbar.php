<?php
$currentUri = service('uri')->getPath();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-extrabold" href="<?= base_url() ?>">
      <i class="fas fa-blog me-2 text-primary"></i>MyBlog
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link <?= $currentUri === '/' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= str_starts_with($currentUri, 'post') ? 'active' : '' ?>" href="<?= base_url('post') ?>">Blog</a>
        </li>
        <?php if (logged_in()) : ?>
          <li class="nav-item">
            <a class="nav-link <?= str_starts_with($currentUri, 'admin') ? 'active' : '' ?>" href="<?= base_url('admin/post') ?>">Admin</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link <?= $currentUri === 'about' ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $currentUri === 'contact' ? 'active' : '' ?>" href="<?= base_url('contact') ?>">Contact</a>
        </li>
      </ul>
      <form class="d-flex me-2" action="<?= base_url('post') ?>" method="get">
        <input class="form-control me-2 border-0" type="search" name="keyword" placeholder="Search" aria-label="Search" value="<?= service('request')->getGet('keyword') ?>">
        <button class="btn btn-outline-light rounded-pill px-3" type="submit"><i class="fas fa-search"></i></button>
      </form>
      <div class="navbar-nav">
        <?php if (logged_in()) : ?>
            <a class="btn btn-outline-danger rounded-pill px-3" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
        <?php else: ?>
            <a class="btn btn-outline-light rounded-pill px-3" href="<?= base_url('login') ?>"><i class="fas fa-sign-in-alt me-1"></i>Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
