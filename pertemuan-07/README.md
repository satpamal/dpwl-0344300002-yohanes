# Pertemuan-07

Pengujian dan pengembangan yang dilakukan:
1. artefak P6 pada dpwl-nim\ siap digunakan karena fitur-fitur nya sudah berfungsi dengan baik.
1. menyalin artefak final P6 ke pertemuan-07
2. membuat application/models/Transaksi_model.php dengan membuat method ambilKunci() dan lepasKunci(), pengkodean kode sewa menjadi INV/YYYYMMDD/NN, misalnya INV/20260702/01 menggunakan method kunciDanBuatKodeSewa().
3. membuat application/controllers/Transaksi_controller.php denan method tambah(), wajibLoginPenyewa(), wajibMetode(), redirectTambahDenganPesan(), pesanBisnisAman().
4. update file application/config/routes.php agar dapat menambahkan mobil ke keranjang (transaksi/tambah atau transaksi_controller/tambah).
5. memodifikasi application/views/katalog/detail.php agar tombol Add To Cart diganti dengan pemberitahuan serta tautan Login Penyewa dan Registrasi dan bisa mengeksekusi route transaksi/tambah (belum masuk ke tabel, karena bukan diproses di tahap ini). tahap ini juga menyesuaikan status ketersediaan kendaraan baru tombol tambah ke keranjangnya aktif.
6. memodifikasi application/views/katalog/index.php agar tombol tambah ke keranjang tidak aktif saat belum login dan menambah mobil ke keranjang setelah diklik saat login (belum masuk ke tabel, karena bukan diproses di tahap ini). tahap ini juga menyesuaikan status ketersediaan kendaraan baru tombol tambah ke keranjangnya aktif.
7. 
8. membuat application/views/transaksi/keranjang.php
9. 
10. 
11. application\views\katalog\n1. avbar.php Menampilkan flash message dan jumlah mobil aktual serta link ke keranjang <?= $e(site_url('transaksi/keranjang')) ?>
12. Mengirim jumlah keranjang ke halaman katalog dan detail application\controllers\Katalog_controller.php.
13. modifikasi method keranjang pada application\controllers\Transaksi_controller.php agar bisa menghandle dengan kode sewa kosong
14. halaman keranjang, khususnya update setelah berhasil dipanggil. format waktu sewa dibuat 24 jam dengan select2.
15. application\controllers\Penyewa_controller.php harus mengirim jumlah keranjang karena jumlah keranjang kosong pada profil, dibahas terakhir saja di materi untuk navbar.php.
16. setelah keranjang selesai, lanjut ke checkout. tepatnya model melakukan validasi dan mengubah status transaksi dari keranjang menjadi diajukan menggunakan file application/views/transaksi/konfirmasi.php. selain itu membuat record pembayaran ke tabel t_bayar terkait DP 30%.
17. selesai