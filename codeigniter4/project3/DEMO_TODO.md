# Demo Program MyBlog (TechnoDaily) - 5-7 Menit

## Persiapan Sebelum Demo (Lakukan sebelum presentasi)
- [ ] Pastikan MySQL berjalan (`sudo service mysql start`)
- [ ] Pastikan dependencies terinstall (`composer install`)
- [ ] Jalankan migrasi database (`php spark migrate`)
- [ ] Seed data sampel (`php spark db:seed CategorySeeder` && `php spark db:seed PostSeeder`)
- [ ] Start server (`php spark serve` atau `php -S localhost:8080 -t public`)
- [ ] Buka browser di `http://localhost:8080`
- [ ] Pastikan akun admin sudah dibuat (register di `/register` atau `php spark auth:create-user`)

---

## Alur Demo (5-7 Menit)

### 1. Opening - Perkenalan Project (30 detik)
- [ ] Jelaskan nama aplikasi: **MyBlog (TechnoDaily)**
- [ ] Tujuan: Platform blog untuk sharing tutorial pemrograman dan berita teknologi
- [ ] Tech stack: PHP 8.3 + CodeIgniter 4.7 + MySQL + Bootstrap 5

---

### 2. Menampilkan Halaman Public (1-1.5 menit)
- [ ] **Homepage** (`http://localhost:8080/`)
  - Jelaskan hero section dengan branding "TechnoDaily"
  - Tunjukkan 3 latest posts yang ditampilkan
  - Sebutkan newsletter signup CTA

- [ ] **Halaman Blog** (`/posts`)
  - Tunjukkan daftar artikel dengan pagination (6 per halaman)
  - Jelaskan card-based layout dengan hover effects
  - Demo fitur **search** (cari kata kunci tertentu)

- [ ] **Detail Post** (klik salah satu post)
  - Tunjukkan breadcrumb navigation
  - Featured image, author, tanggal, kategori
  - Jelaskan slug-based URL structure

- [ ] **Category Filtering** (opsional - cepat sebutkan)
  - Tunjukkan filter berdasarkan kategori (Technology, Food, Lifestyle, Travel)

---

### 3. Admin Login & Authentication (30 detik)
- [ ] Akses `/admin/post` → akan redirect ke login
- [ ] Jelaskan sistem authentication dengan **Myth/Auth**
- [ ] Login dengan akun admin
- [ ] Tunjukkan navbar berubah (ada tombol logout & menu admin)

---

### 4. Admin Dashboard - CRUD Operations (2-3 menit)
- [ ] **Dashboard Admin** (`/admin/post`)
  - Tunjukkan list semua posts (published & draft)
  - Jelaskan status badge (Published/Draft)
  - Tunjukkan informasi author dan tanggal

- [ ] **Create Post** (klik "Create New Post")
  - Isi form: judul, konten, pilih kategori
  - Upload featured image (JPG/PNG/WEBP, max 2MB)
  - Pilih status: Published atau Draft
  - Submit dan tunjukkan flash message sukses
  - Buka post baru di halaman publik

- [ ] **Edit Post** (klik edit pada salah satu post)
  - Ubah beberapa field (judul/konten)
  - Ganti featured image (tunjukkan fitur replace image)
  - Simpan dan verifikasi perubahan

- [ ] **Preview Post** (jika ada draft)
  - Tunjukkan fitur preview sebelum publish

- [ ] **Delete Post** (hapus salah satu post)
  - Konfirmasi penghapusan
  - Jelaskan bahwa image juga terhapus (cleanup)

---

### 5. Technical Highlights (1-1.5 menit)
- [ ] **MVC Architecture**
  - Tunjukkan struktur direktori `app/Controllers`, `app/Models`, `app/Views`
  - Jelaskan separation of concerns

- [ ] **Database Migrations**
  - Buka `app/Database/Migrations/` → tunjukkan version-controlled schema
  - Jelaskan tabel `posts` dan `categories` dengan relationship

- [ ] **Route Protection**
  - Buka `app/Config/Routes.php` → tunjukkan filter `'filter' => 'login'` untuk admin routes
  - Jelaskan route grouping untuk user dan admin

- [ ] **Image Upload Handling**
  - Validasi file type dan size
  - Random filename generation untuk security
  - Auto-delete old image saat update

---

### 6. Closing (30 detik)
- [ ] Summary fitur yang didemo:
  - ✅ Public blog dengan search & pagination
  - ✅ Admin CRUD dengan authentication
  - ✅ Image upload dengan validasi
  - ✅ Clean UI dengan Bootstrap 5
- [ ] Sebutkan potensi pengembangan (comments, tags, user roles, dll)
- [ ] Tanya jawab

---

## Tips Demo
- **Gunakan data sampel yang menarik** (jangan biarkan post kosong)
- **Siapkan 1-2 gambar** di folder lokal untuk demo upload
- **Pastikan koneksi internet stabil** (untuk CDN Font Awesome & Google Fonts)
- **Latihan 1-2 kali** untuk memastikan timing 5-7 menit
- **Siapkan backup plan** jika server error (screenshot/video recording)
- **Highlight UI yang menarik** (gradient, cards, badges) - ini yang memorable untuk audience

## File Penting yang Bisa Ditunjukkan Saat Demo
| File | Kegunaan |
|------|----------|
| `app/Config/Routes.php` | Daftar semua routes |
| `app/Controllers/Admin/PostAdmin.php` | Logic CRUD admin |
| `app/Models/PostModel.php` | Post data model |
| `app/Views/layouts/main.php` | Master template dengan custom CSS |
| `app/Database/Migrations/` | Database schema |
| `.env` | Environment configuration |

---

**Estimasi Waktu Total: 5-7 menit**
