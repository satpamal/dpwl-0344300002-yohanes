# Pertemuan-07

Pengujian dan pengembangan yang dilakukan:
1. menyalin artefak final P6 ke pertemuan-07
2. membuat application/models/Transaksi_model.php dengan pengkodean kode sewa menjadi INV/YYYYMMDD/NN, misalnya INV/20260702/01.
3. membuat application/controllers/Transaksi_controller.php
4. membuat application/views/transaksi/keranjang.php
5. update file application/config/routes.php
6. memperbaiki halaman katalog dan detail untuk kondisi tombol tambah ke keranjang.
7. memperbaiki application/views/katalog/detail.php agar tombol Add To Cart diganti dengan pemberitahuan serta tautan Login Penyewa dan Registrasi.
8. memperbaiki application/views/katalog/index.php agar tombol tambah ke keranjang tidak aktif saat belum login.
9. application\views\katalog\navbar.php Menampilkan flash message dan jumlah mobil aktual serta link ke keranjang <?= $e(site_url('transaksi/keranjang')) ?>
10. application\controllers\Katalog_controller.php Mengirim jumlah keranjang ke halaman katalog dan detail.
11. modifikasi method keranjang pada application\controllers\Transaksi_controller.php agar bisa bekerja dengan kode sewa kosong
12. halaman keranjang, khususnya update setelah berhasil dipanggil. format waktu 24 jam dengan select2.
13. application\controllers\Penyewa_controller.php harus mengirim jumlah keranjang karena jumlah keranjang kosong, itu bahas terakhir saja di materi untuk navbar.php
14. setelah keranjang selesai, lanjut ke checkout. tepatnya model melakukan validasi dan mengubah status transaksi dari keranjang menjadi diajukan menggunakan file application/views/transaksi/konfirmasi.php. selain itu membuat record pembayaran ke tabel t_bayar terkait DP 30%.
15. selesai