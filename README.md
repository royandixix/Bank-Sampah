♻️ Sistem Pengelolaan Bank Sampah Berbasis Laravel

Aplikasi web untuk membantu proses pengelolaan bank sampah secara terpusat, mulai dari data pengguna dan jenis sampah, transaksi setoran, saldo nasabah, penarikan saldo, pengaduan, notifikasi, hingga laporan transaksi.

Project ini dibangun menggunakan Laravel 12, PHP 8.2+, SQLite, Blade, dan Bootstrap 5.

✨ Fitur Utama

Autentikasi login dan logout.

Hak akses berdasarkan role: Admin, Petugas, dan Nasabah.

Dashboard berbeda sesuai role pengguna.

CRUD data pengguna.

CRUD kategori sampah.

CRUD data sampah dan harga per kilogram.

Upload gambar data sampah.

Transaksi setoran sampah dengan perhitungan otomatis berat × harga/kg.

Alur status setoran: pending → weighed → completed / cancelled.

Penambahan stok sampah otomatis saat setoran selesai.

Pencatatan saldo nasabah menggunakan account ledger.

Pengajuan penarikan saldo oleh nasabah.

Validasi saldo sebelum penarikan.

Alur status penarikan: pending → approved → paid / rejected.

Upload bukti pembayaran penarikan.

Riwayat perubahan status transaksi.

Pengaduan nasabah beserta lampiran.

Pengelolaan status dan tanggapan pengaduan.

Notifikasi dalam aplikasi.

Pencarian, filter, dan pagination.

Soft delete pada data tertentu.

Form Request Validation.

Pemeriksaan kepemilikan data nasabah.

Laporan transaksi berdasarkan rentang tanggal.

Tampilan responsif menggunakan Bootstrap 5.

👥 Hak Akses

Admin

Mengelola pengguna.

Mengelola kategori sampah.

Mengelola data sampah.

Melihat dan memproses transaksi setoran.

Melihat dan memproses penarikan.

Mengelola pengaduan.

Melihat dashboard dan laporan.

Petugas

Mengelola data sampah.

Mencatat setoran nasabah.

Memproses status setoran.

Memproses penarikan saldo.

Memproses pengaduan.

Melihat dashboard dan laporan.

Nasabah

Melihat setoran milik sendiri.

Melihat saldo.

Mengajukan penarikan saldo.

Melihat riwayat penarikan.

Membuat pengaduan.

Melihat status transaksi dan pengaduan.

🛠️ Teknologi

PHP 8.2+

Laravel 12

SQLite

Blade Template Engine

Bootstrap 5.3

Composer

📋 Persyaratan Sistem

Pastikan perangkat sudah memiliki:

PHP 8.2 atau lebih baru

Composer

Ekstensi PHP SQLite / PDO SQLite

🚀 Instalasi

1. Clone repository

git clone https://github.com/USERNAME/NAMA-REPOSITORY.git
cd NAMA-REPOSITORY

Ganti USERNAME dan NAMA-REPOSITORY sesuai repository GitHub Anda.

2. Install dependency

composer install

3. Salin file environment

macOS / Linux:

cp .env.example .env

Windows CMD:

copy .env.example .env

Windows PowerShell:

Copy-Item .env.example .env

4. Generate application key

php artisan key:generate

5. Siapkan database SQLite

Pastikan file berikut tersedia:

database/database.sqlite

Jika belum ada, buat file kosong tersebut.

6. Jalankan migration dan seeder

php artisan migrate:fresh --seed

7. Buat symbolic link storage

php artisan storage:link

8. Jalankan aplikasi

php artisan serve

Kemudian buka:

http://127.0.0.1:8000

Jika port 8000 sedang digunakan:

php artisan serve --port=8001

🔐 Akun Demo

Role

Email

Password

Admin

admin@banksampah.test

password

Petugas

petugas@banksampah.test

password

Nasabah

nasabah@banksampah.test

password

Nasabah

siti@banksampah.test

password

Akun di atas dibuat otomatis melalui database seeder dan hanya digunakan untuk pengujian/demo.

🔄 Alur Transaksi Setoran

Petugas membuat setoran
        ↓
     pending
        ↓
     weighed
        ↓
    completed
        ↓
Saldo nasabah bertambah

Setoran juga dapat berubah menjadi cancelled sesuai aturan status aplikasi.

💰 Alur Penarikan Saldo

Nasabah mengajukan penarikan
        ↓
      pending
        ↓
     approved
        ↓
       paid
        ↓
Saldo nasabah berkurang

Permintaan juga dapat berubah menjadi rejected.

🗃️ Struktur Database

Project menggunakan 12 tabel utama:

users

waste_categories

wastes

deposits

deposit_details

deposit_status_histories

withdrawals

withdrawal_status_histories

account_ledgers

app_notifications

complaints

complaint_status_histories

📁 Struktur Project Singkat

app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│   └── Requests/
├── Models/

database/
├── migrations/
├── seeders/
└── database.sqlite

resources/
└── views/

routes/
└── web.php

🧪 Reset Data Demo

Untuk menghapus seluruh data lalu membuat ulang data contoh:

php artisan migrate:fresh --seed

📌 Catatan

Database default menggunakan SQLite agar project mudah dijalankan tanpa konfigurasi MySQL.

Jika ingin menggunakan MySQL, ubah konfigurasi DB_CONNECTION dan parameter DB_* pada file .env.

Bootstrap digunakan melalui CDN sehingga project tidak memerlukan npm install untuk tampilan saat ini.

Jangan upload file .env ke repository publik karena dapat berisi konfigurasi sensitif.

Folder vendor/ sebaiknya tidak disimpan di repository karena dapat dibuat kembali dengan composer install.

🎯 Tujuan Project

Aplikasi ini dibuat untuk mendigitalisasi proses pencatatan bank sampah agar transaksi lebih terstruktur, perhitungan nilai setoran lebih akurat, saldo nasabah mudah dipantau, serta proses penarikan dan pelaporan dapat dikelola secara lebih efisien.