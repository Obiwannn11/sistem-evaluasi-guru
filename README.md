# Sistem Evaluasi Guru

![Logo Sistem Evaluasi Guru](path/to/logo.png)

**Sistem Evaluasi Guru** adalah sebuah aplikasi web yang dirancang untuk memudahkan proses evaluasi guru di berbagai institusi pendidikan seperti SMP, SMA, dan lain - lain. Aplikasi ini menyediakan berbagai fitur untuk mengelola penilaian, melacak kinerja guru, dan menghasilkan laporan yang akurat.

## Deskripsi Proyek

Sistem Evaluasi Guru dirancang untuk memenuhi kebutuhan institusi pendidikan dalam hal evaluasi guru. Fitur-fitur utama dari aplikasi ini meliputi:

- **Manajemen Data Guru**: Menyimpan dan mengelola data guru termasuk biodata, riwayat pendidikan, dan pengalaman kerja. (menyusul)
- **Penilaian Kinerja**: Melakukan penilaian kinerja guru berdasarkan kriteria yang ditentukan. (menggunakan tabel)
- **Laporan Evaluasi**: Menghasilkan laporan evaluasi yang dapat diekspor ke berbagai format (PDF, Excel).
- **Dashboard**: Menyediakan dashboard interaktif untuk melihat ringkasan kinerja guru.
- **Akses Multi-User**: Mendukung akses untuk admin, kepala sekolah, dan guru.

## Panduan Instalasi

Berikut adalah langkah-langkah untuk menginstal dan menjalankan Sistem Evaluasi Guru di lingkungan lokal Anda.

### Prasyarat

- **Node.js** (versi 14.x atau lebih baru)
- **npm** (versi 6.x atau lebih baru)
- **PHP** (versi 8.x atau lebih baru)
- **Composer** (versi 2.x atau lebih baru)
- **MySQL** (versi 8.x atau lebih baru)
- **Laravel** (versi 11.x atau lebih baru)

### Langkah-langkah Instalasi

1. **Clone Repositori**

   ```bash
   git clone https://github.com/Obiwannn11/sistem-evaluasi-guru.git
   cd sistem-evaluasi-guru
   ```

2. **Instal Dependensi PHP**

   ```bash
   composer install
   ```

3. **Instal Dependensi JavaScript**

   ```bash
   npm install
   ```

4. **Konfigurasi Lingkungan**

   Salin file `.env.example` menjadi `.env` dan konfigurasi sesuai dengan pengaturan database Anda.

   ```bash
   cp .env.example .env
   ```

   Edit file `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sistem_evaluasi_guru
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Key Aplikasi**

   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database**

   ```bash
   php artisan migrate
   ```

7. **Seed Database (Opsional)**

   Jika Anda ingin menambahkan data dummy, jalankan:

   ```bash
   php artisan db:seed
   ```
   untuk Sementara Belum ada Seeder

8. **Jalankan Aplikasi**

   ```bash
   php artisan serve
   npm run dev
   ```

   Aplikasi akan berjalan di `http://localhost:8000`.

## Petunjuk Penggunaan

Berikut adalah panduan singkat untuk menggunakan Sistem Evaluasi Guru.

### Login

1. Buka browser dan akses `http://localhost:8000`.
2. Masukkan kredensial login: (sesuai Seeder)
   - **Username**: `admin@smk.id`
   - **Password**: `password`

### Fitur Utama

- **Manajemen Data Guru**: Tambah, edit, dan hapus data guru (khusus admin).
- **Penilaian Kinerja**: Lakukan penilaian kinerja guru berdasarkan kriteria yang ditentukan (khusus admin/kepala sekolah).
- **Laporan Evaluasi**: Unduh laporan evaluasi dalam format PDF atau Excel (bisa diunduh oleh guru)
- **Dashboard**: Lihat ringkasan kinerja guru secara visual.

