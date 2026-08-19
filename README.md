# Sistem Pengelolaan Bank Sampah Berbasis Laravel

Proyek tugas Laravel dengan 3 role: **Admin, Petugas, Nasabah**.

## Fitur
- Login dan middleware role.
- 12 tabel inti database.
- CRUD pengguna, kategori sampah, dan data sampah.
- Upload gambar sampah, lampiran pengaduan, dan bukti pembayaran penarikan.
- Transaksi setoran dengan perhitungan otomatis berat × harga/kg.
- Status setoran bertahap: pending → weighed → completed / cancelled.
- Transaksi penarikan saldo dengan pengecekan saldo tersedia.
- Status penarikan: pending → approved → paid / rejected.
- Riwayat perubahan status.
- Saldo nasabah melalui account ledger.
- Pengaduan nasabah.
- Notifikasi dalam aplikasi.
- Pencarian, filter, pagination.
- Soft delete.
- Form Request Validation.
- Pemeriksaan kepemilikan data transaksi.
- Dashboard berbeda sesuai role.
- Laporan berdasarkan rentang tanggal dan fitur cetak browser.
- Tampilan responsif menggunakan Bootstrap 5.

## Alur Demo Singkat
1. Login sebagai Admin untuk melihat dashboard, kelola pengguna/kategori/sampah.
2. Login Petugas → buat setoran untuk nasabah → ubah `pending` ke `weighed` → `completed`.
3. Login Nasabah → saldo bertambah → ajukan penarikan.
4. Login Petugas/Admin → approve → paid + upload bukti.
5. Tampilkan riwayat status, dashboard, pengaduan, dan laporan.

Lihat `PETUNJUK_INSTALASI.txt` dan `AKUN_PENGUJIAN.txt`.
# Bank-Sampah
