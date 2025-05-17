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
2. Buka File di vscode atau yang lain buat di terminal ("php artisan serve")
3. Akan muncul halaman utama (landing page) aplikasi SISTA.
   ![Landing Page SISTA](https://github.com/AkmalRendiansyah/tes0/blob/main/landing_page_sista.png)

### Registrasi & Login

#### Registrasi

- Digunakan untuk pendaftaran akun oleh mahasiswa. Untuk dosen dan kaprodi bisa dilakukan oleh admin.
- Data yang diperlukan:
  - Username (min. 4 karakter)
  - NIM / NIDN / NIP (min. 10 karakter)
  - Email aktif & unik
  - Password (min. 6 karakter)
![Regis1](https://github.com/AkmalRendiansyah/tes0/blob/main/regis1.png)
![Regis2](https://github.com/AkmalRendiansyah/tes0/blob/main/regis2.png)

#### Login

- Masukkan email dan password yang telah didaftarkan.
  ![Login](https://github.com/AkmalRendiansyah/tes0/blob/main/login.png)

---

## 🧾 Fitur Utama

### ✅ Pendaftaran Sidang TA oleh Mahasiswa

1. Membuat Proposal TA dan seminar Proposal TA  
   Untuk membuat jadwal Proposal TA, masuk ke menu Proposal TA pada sidebar sebelah kiri. tekan ‘add jawal’ untuk membuat  
   - Mahasiswa memilih 2 pembimbing yang akan membimbing selama pengerjaan TA  
   - Mahasiswa mengupload Proposal TA untuk divalidasi oleh pembimbing dan kaprodi  
   - Mahasiswa tinggal menunggu hasil validasi dari pembimbing dan kaprodi  
   - Mahasiswa bisa melihat status proposal pada menu Status Proposal  
   - Setelah proposal TA divalidasi oleh pembimbing dan kaprodi maka kaprodi akan membuat jadwal seminar proposal untuk mahasiswa tersebut  
   - Mahasiswa bisa melihat jadwal sidang di jadwal Proposal TA  

2. Mendaftar Sidang TA  
   Setelah TA mahasiswa telah selesai, maka selanjutnya adalah sidang TA. Masuk ke menu Sidang TA kemudian tekan ‘add sidang’ untuk mendaftar sidang TA  
   - Cara yang sama dengan pendaftaran Seminar Proposal TA  
   - Berkas yang diupload bertambah menjadi laporan TA, laporan PKL, proposal TA, dan lembar bimbingan



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

- ![Laravel](https://img.shields.io/badge/Laravel-%23FF2D20.svg?style=flat&logo=laravel&logoColor=white) [Laravel](https://laravel.com/) - PHP Web Framework
- ![Blade](https://img.shields.io/badge/Blade%20Template-%23F7523F.svg?style=flat&logo=laravel&logoColor=white) Blade Template Engine
- ![MySQL](https://img.shields.io/badge/MySQL-%2300f.svg?style=flat&logo=mysql&logoColor=white) MySQL / MariaDB
- ![HTML5](https://img.shields.io/badge/HTML5-%23E34F26.svg?style=flat&logo=html5&logoColor=white) HTML
- ![CSS3](https://img.shields.io/badge/CSS3-%231572B6.svg?style=flat&logo=css3&logoColor=white) CSS
- ![JavaScript](https://img.shields.io/badge/JavaScript-%23F7DF1E.svg?style=flat&logo=javascript&logoColor=black) JavaScript

---



