# Dokumentasi Project Portofolio

Project ini adalah sebuah website portofolio pribadi yang dibangun menggunakan framework **CodeIgniter 4** dengan template **iPortfolio**.

## Struktur Project

Berikut adalah penjelasan singkat mengenai struktur folder utama dalam project ini:

- `app/`: Berisi kode aplikasi utama (Controller, View, Config, dll).
  - `Controllers/`: Berisi logika navigasi. `Home.php` adalah controller utama yang menampilkan halaman portofolio.
  - `Views/`: Berisi file tampilan (HTML/PHP). File utama adalah `portfolio.php`.
  - `Config/`: Berisi konfigurasi aplikasi seperti routing (`Routes.php`).
- `public/`: Folder yang dapat diakses publik. Berisi asset statis.
  - `iPortfolio/`: Berisi asset template (CSS, JS, Gambar, Vendor).
  - `index.php`: Entry point utama aplikasi.
- `writable/`: Folder untuk menyimpan cache, log, dan session (harus memiliki izin tulis).

## Teknologi yang Digunakan

- **Framework:** CodeIgniter 4.5.1
- **Bahasa:** PHP 8.2+
- **Frontend Template:** iPortfolio (Bootstrap based)
- **Library Tambahan:** AOS (Animate on Scroll), Typed.js, GLightbox, Swiper, Isotope.

## Cara Mengedit Informasi Pribadi

Hampir seluruh informasi tampilan berada di satu file utama: `app/Views/portfolio.php`.

### 1. Mengubah Nama dan Profil
Cari bagian `<!-- Nama / Logo -->` dan `<!-- Hero Section -->` untuk mengubah nama yang tampil di sidebar dan halaman utama.

### 2. Mengubah Biodata (About)
Cari bagian `<section id="about">`. Di sini Anda bisa mengedit:
- Deskripsi profesional.
- Detail seperti Tanggal Lahir, Email, Telepon, dan Alamat.

### 3. Mengubah Peta Lokasi (Google Maps)
Cari tag `<iframe>` di dalam bagian `<!-- Info Kontak -->`. Anda bisa mengganti parameter `src` dengan link embed dari Google Maps untuk lokasi Anda sendiri.

### 4. Mengubah Gambar
Gambar profil dan background hero dapat ditemukan di:
- `public/iPortfolio/assets/img/gambar1.jpeg` (Hero Background)
- `public/iPortfolio/assets/img/gambar2.jpeg` (Foto Profil)

## Cara Menjalankan Project

1. Pastikan PHP 8.2+ dan Composer sudah terinstall.
2. Jalankan perintah berikut di terminal root project:
   ```bash
   php spark serve
   ```
3. Buka browser dan akses `http://localhost:8080`.

---
Dokumentasi ini dibuat untuk membantu pengelolaan source code project portofolio Ramadhan Anton Pratama.
