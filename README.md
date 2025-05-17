# Sistem Informasi Sidang Tugas Akhir (SISTA)

Aplikasi **Sistem Informasi Sidang Tugas Akhir (SISTA)** merupakan sistem berbasis web yang dikembangkan menggunakan **Laravel** dan **Blade Template Engine** untuk memudahkan proses administrasi dan manajemen sidang tugas akhir mahasiswa.

## 📌 Deskripsi Umum Aplikasi

SISTA dikembangkan untuk mendukung proses pengelolaan sidang tugas akhir di lingkungan kampus. Aplikasi ini memfasilitasi proses registrasi pengguna (mahasiswa, dosen, kaprodi), pendaftaran sidang, penjadwalan, penilaian, dan pelaporan sidang TA secara terintegrasi.

## 📁 Struktur Menu

1. **Landing Page**
2. **Login & Registrasi**
3. **Dashboard User**
   - Mahasiswa
   - Dosen
   - Kaprodi
   - Admin

## 🚀 Penggunaan

### Cara Membuka Aplikasi

1. Buka web browser (Chrome, Firefox, atau lainnya).
2. Akses URL aplikasi: `https://[alamat-aplikasi-kamu]`
3. Akan muncul halaman utama (landing page) aplikasi SISTA.

### Registrasi & Login

#### Registrasi

- Digunakan untuk pendaftaran akun oleh mahasiswa. Untuk dosen dan kaprodi bisa dilakukan oleh admin.
- Data yang diperlukan:
  - Username (min. 4 karakter)
  - NIM / NIDN / NIP (min. 10 karakter)
  - Email aktif & unik
  - Password (min. 6 karakter)

#### Login

- Masukkan email dan password yang telah didaftarkan.

---

## 🧾 Fitur Utama

### ✅ Pendaftaran Sidang TA oleh Mahasiswa

1. Upload proposal TA
2. Memilih pembimbing TA
3. Menunggu validasi dari pembimbing dan kaprodi
4. Melihat status & jadwal seminar proposal

### ✅ Pendaftaran Sidang TA oleh Kaprodi

- Validasi berkas mahasiswa
- Penjadwalan sidang (input:
  - Mahasiswa
  - Penguji 1, 2, 3
  - Tanggal, sesi, dan ruang)

### ✅ Penilaian Sidang

- Penguji dan pembimbing memberikan nilai dan komentar
- Sistem menghitung nilai total otomatis
- Mahasiswa bisa melihat hasil akhir pada menu nilai sidang

### ✅ Laporan dan Rekapitulasi

- Admin/Kaprodi dapat mencetak:
  - Laporan penguji sidang
  - Laporan kelulusan sidang

---

## 🛠️ Teknologi yang Digunakan

- [Laravel](https://laravel.com/) - PHP Web Framework
- Blade Template Engine
- MySQL / MariaDB
- HTML, CSS, JavaScript

---



