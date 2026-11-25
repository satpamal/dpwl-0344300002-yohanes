-- P10 DPWL: tambahkan status transaksi 'lunas'.
-- Jalankan satu kali pada database db_dpwl_nama123.
-- Pastikan backup database tersedia sebelum menjalankan perubahan skema.

ALTER TABLE `t_sewa`
  MODIFY COLUMN `status_sewa`
  ENUM(
    'diajukan',
    'disetujui',
    'ditolak',
    'aktif',
    'selesai',
    'batal',
    'keranjang',
    'lunas'
  )
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_520_ci
  DEFAULT 'keranjang';
