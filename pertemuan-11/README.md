# P11 – Pemenuhan atau Penyerahan Objek Transaksi dengan MVC

## A. Dokumentasi Persiapan Baseline P10

### A.1. Workspace dan Artefak P10

Artefak P10 telah disalin ke workspace `dpwl-nim\` sebagai dasar pengembangan P11. Pengembangan dilakukan secara kumulatif dengan mempertahankan struktur dan fitur aplikasi sebelumnya.

### A.2. Struktur Aplikasi dan Basis Data

Struktur aplikasi homemade MVC dan basis data MySQL telah diperiksa. Tabel yang digunakan dalam pengembangan P11 meliputi `t_sewa`, `t_pilih`, `t_mobil`, `t_bayar`, dan `t_penyewa`.

### A.3. Pemeriksaan Fitur P10

Fitur transaksi dan pembayaran P10 telah diperiksa melalui aplikasi. Hasil pemeriksaan:

- semua fitur pada P10 berhasil diuji.
- Tidak ada kendala yang ditemukan.
- Tidak ada perbaikan yang dilakukan.

### A.4. Dokumentasi dan Repositori Git

Dokumentasi P11 disiapkan pada `pertemuan-11\README.md`. Hasil pekerjaan disimpan dalam direktori `pertemuan-11` dan dikelola menggunakan Git.

**Commit:** `Menyiapkan artefak P10 untuk baseline pengembangan P11`

1. membuat application/models/SerahTerima_model.php
2. membuat application/controllers/SerahTerima_controller.php
3. menambah route p11 di application\config\routes.php
4. mengubah application\views\templates\sidebar.php untuk menambah menu serah terima
5. membuat application/views/admin/serah_terima.php
6. membuat application/views/admin/serah_terima_detail.php
7. memperbarui application\models\Pembayaran_model.php dan application\views\admin\pelunasan_detail.php untuk status sewa 'aktif'
