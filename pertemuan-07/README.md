# Pertemuan-07

Pengujian dan pengembangan yang dilakukan:
1. artefak P6 pada dpwl-nim\ siap digunakan karena fitur-fitur nya sudah berfungsi dengan baik.
1. menyalin artefak final P6 ke pertemuan-07
2. membuat application/models/Transaksi_model.php dengan membuat method ambilKunci() dan lepasKunci(), pengkodean kode sewa menjadi INV/YYYYMMDD/NN, misalnya INV/20260702/01 menggunakan method kunciDanBuatKodeSewa().
3. membuat application/controllers/Transaksi_controller.php
4. membuat application/views/transaksi/keranjang.php
5. update file application/config/routes.php agar dapat menambahkan mobil ke keranjang.
6. memperbaiki halaman katalog dan detail untuk kondisi tombol tambah ke keranjang.
7. memperbaiki application/views/katalog/detail.php agar tombol Add To Cart diganti dengan pemberitahuan serta tautan Login Penyewa dan Registrasi.
8. memperbaiki application/views/katalog/index.php agar tombol tambah ke keranjang tidak aktif saat belum login.
9. application\views\katalog\n1. avbar.php Menampilkan flash message dan jumlah mobil aktual serta link ke keranjang <?= $e(site_url('transaksi/keranjang')) ?>
10. Mengirim jumlah keranjang ke halaman katalog dan detail application\controllers\Katalog_controller.php.
11. modifikasi method keranjang pada application\controllers\Transaksi_controller.php agar bisa menghandle dengan kode sewa kosong
12. halaman keranjang, khususnya update setelah berhasil dipanggil. format waktu sewa dibuat 24 jam dengan select2.
13. application\controllers\Penyewa_controller.php harus mengirim jumlah keranjang karena jumlah keranjang kosong pada profil, dibahas terakhir saja di materi untuk navbar.php.
14. setelah keranjang selesai, lanjut ke checkout. tepatnya model melakukan validasi dan mengubah status transaksi dari keranjang menjadi diajukan menggunakan file application/views/transaksi/konfirmasi.php. selain itu membuat record pembayaran ke tabel t_bayar terkait DP 30%.
15. selesai