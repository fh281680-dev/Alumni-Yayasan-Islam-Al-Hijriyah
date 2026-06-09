```

---

## Langkah 10: Checklist Testing & Instalasi

### A. Checklist Testing
```
TESTING WEBSITE ALUMNI AL-HIJRIYAH PURI

[ ] 1. DATABASE
    [ ] Import file SQL ke phpMyAdmin
    [ ] Cek semua tabel berhasil dibuat
    [ ] Cek data sample alumni sudah ada
    [ ] Cek user admin (nama: admin, password: admin123)

[ ] 2. KONFIGURASI
    [ ] Edit config/database.php sesuai hosting
    [ ] Set DB_HOST, DB_NAME, DB_USER, DB_PASS
    [ ] Test koneksi database

[ ] 3. STRUKTUR FOLDER
    [ ] Buat folder: assets/uploads/alumni/
    [ ] Buat folder: assets/uploads/galeri/
    [ ] Buat folder: assets/uploads/berita/
    [ ] Set permission 755 untuk folder uploads

[ ] 4. HALAMAN PUBLIK
    [ ] Akses index.php (beranda)
    [ ] Test menu navigasi
    [ ] Halaman Alumni - pencarian & filter
    [ ] Detail Alumni
    [ ] Halaman Beasiswa
    [ ] Detail Beasiswa
    [ ] Halaman Galeri (dengan pagination)
    [ ] Halaman Berita (list & detail)

[ ] 5. LOGIN & AUTENTIKASI
    [ ] Login dengan user admin (admin / admin123)
    [ ] Cek redirect ke dashboard admin
    [ ] Cek proteksi halaman admin tanpa login
    [ ] Test logout
    [ ] Login dengan user siswa (jika ada)

[ ] 6. DASHBOARD ADMIN
    [ ] Cek tampilan statistik
    [ ] Test semua menu sidebar

[ ] 7. CRUD ALUMNI
    [ ] Tambah data alumni baru
    [ ] Edit data alumni
    [ ] Hapus data alumni
    [ ] Cek data muncul di halaman publik

[ ] 8. CRUD BEASISWA
    [ ] Tambah beasiswa
    [ ] Edit beasiswa
    [ ] Ubah status aktif/nonaktif
    [ ] Hapus beasiswa
    [ ] Cek di halaman publik

[ ] 9. CRUD GALERI
    [ ] Upload gambar manual ke folder
    [ ] Tambah data galeri
    [ ] Edit data galeri
    [ ] Hapus galeri
    [ ] Cek tampilan di halaman publik

[ ] 10. CRUD BERITA
    [ ] Tambah berita (draft)
    [ ] Edit berita
    [ ] Publish berita
    [ ] Cek slug auto-generate
    [ ] Hapus berita
    [ ] Cek di halaman publik

[ ] 11. MANAJEMEN USER
    [ ] Tambah user siswa baru
    [ ] Tambah user admin baru
    [ ] Edit user
    [ ] Ubah password
    [ ] Hapus user
    [ ] Test login dengan user baru

[ ] 12. KEAMANAN
    [ ] Cek SQL injection (input ' OR '1'='1)
    [ ] Cek XSS (input <script>alert('test')</script>)
    [ ] Cek akses halaman admin tanpa login
    [ ] Cek password di-hash di database

[ ] 13. RESPONSIF
    [ ] Test di desktop
    [ ] Test di tablet
    [ ] Test di mobile

[ ] 14. BROWSER COMPATIBILITY
    [ ] Chrome
    [ ] Firefox
    [ ] Edge
    [ ] Safari (jika ada)
```

---

### B. Panduan Instalasi di Hosting

**FILE: INSTALASI.txt**
```
========================================
PANDUAN INSTALASI WEBSITE ALUMNI
Yayasan Pendidikan Islam AL-Hijriyah Puri
========================================

LANGKAH 1: PERSIAPAN FILE
--------------------------
1. Download semua file project
2. Compress menjadi file ZIP (opsional)

LANGKAH 2: UPLOAD KE HOSTING
-----------------------------
1. Login ke cPanel hosting Anda
2. Masuk ke File Manager
3. Upload semua file ke folder public_html
   atau ke subfolder (misal: public_html/alumni)
4. Extract file ZIP (jika di-compress)

LANGKAH 3: BUAT DATABASE
-------------------------
1. Login ke cPanel
2. Masuk ke MySQL Databases
3. Buat database baru, misal: db_alumni
4. Buat user database, misal: user_alumni
5. Set password user
6. Tambahkan user ke database (All Privileges)
7. Catat nama database, username, dan password

LANGKAH 4: IMPORT DATABASE
---------------------------
1. Masuk ke phpMyAdmin
2. Pilih database yang sudah dibuat
3. Klik tab "Import"
4. Pilih file alumni_alhijriyah.sql
5. Klik "Go"
6. Tunggu sampai selesai

LANGKAH 5: KONFIGURASI
----------------------
1. Edit file: config/database.php
2. Ubah setting berikut:
   
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'db_alumni');      // Nama database Anda
   define('DB_USER', 'user_alumni');     // Username database
   define('DB_PASS', 'password_anda');   // Password database

3. Simpan file

LANGKAH 6: SET PERMISSION FOLDER
---------------------------------
1. Buat folder berikut (jika belum ada):
   - assets/uploads/alumni/
   - assets/uploads/galeri/
   - assets/uploads/berita/
   
2. Set permission folder uploads menjadi 755
   (Klik kanan folder > Change Permissions)

LANGKAH 7: TEST WEBSITE
------------------------
1. Akses website: http://domain-anda.com
   atau: http://domain-anda.com/alumni
   
2. Login admin:
   Nama: admin
   Sandi: admin123

3. PENTING: Segera ganti password admin!
   - Login sebagai admin
   - Masuk ke Manajemen User
   - Edit user admin
   - Ganti password

LANGKAH 8: INPUT DATA
---------------------
1. Hapus data sample alumni (opsional)
2. Tambah data alumni sebenarnya
3. Tambah beasiswa
4. Upload foto galeri
5. Buat berita

========================================
TROUBLESHOOTING
========================================

MASALAH: Error koneksi database
SOLUSI: Cek config/database.php, pastikan
        DB_HOST, DB_NAME, DB_USER, DB_PASS benar

MASALAH: Halaman blank/putih
SOLUSI: Aktifkan error reporting:
        Tambah di awal config/database.php:
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

MASALAH: Gambar tidak muncul
SOLUSI: - Cek folder uploads sudah ada
        - Cek permission folder (755)
        - Cek path gambar di database

MASALAH: CSS tidak load
SOLUSI: Cek link href di header.php
        sesuaikan dengan struktur folder

========================================
INFORMASI AKUN DEFAULT
========================================

ADMIN:
Nama: admin
Sandi: admin123

CATATAN: Segera ganti password setelah
         instalasi pertama kali!

========================================
STRUKTUR FOLDER LENGKAP
========================================

alumni-alhijriyah/
├── admin/
│   ├── index.php
│   ├── alumni/
│   ├── beasiswa/
│   ├── galeri/
│   ├── berita/
│   └── users/
├── assets/
│   ├── css/
│   ├── js/
│   └── uploads/
├── auth/
├── config/
├── includes/
├── pages/
└── index.php

========================================
SUPPORT
========================================

Jika ada pertanyaan atau masalah:
1. Cek dokumentasi di folder docs/
2. Hubungi developer

Terima kasih!
========================================