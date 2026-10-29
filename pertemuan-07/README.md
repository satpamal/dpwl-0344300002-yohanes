# Pertemuan-07

Pengujian dan pengembangan yang dilakukan:

1. artefak P6 pada dpwl-nim\ siap digunakan karena fitur-fitur nya sudah berfungsi dengan baik.
1. menyalin artefak final P6 ke pertemuan-07
2. membuat application/models/Transaksi_model.php dengan membuat method ambilKunci() dan lepasKunci(), pengkodean kode sewa menjadi INV/YYYYMMDD/NN, misalnya INV/20260702/01 menggunakan method kunciDanBuatKodeSewa().
3. membuat application/controllers/Transaksi_controller.php denan method tambah(), wajibLoginPenyewa(), wajibMetode(), redirectTambahDenganPesan(), pesanBisnisAman().
4. update file application/config/routes.php agar dapat menambahkan mobil ke keranjang (transaksi/tambah atau transaksi_controller/tambah).
5. memodifikasi application/views/katalog/detail.php agar tombol Add To Cart diganti dengan pemberitahuan serta tautan Login Penyewa dan Registrasi dan bisa mengeksekusi route transaksi/tambah (belum masuk ke tabel, karena bukan diproses di tahap ini). tahap ini juga menyesuaikan status ketersediaan kendaraan baru tombol tambah ke keranjangnya aktif.
6. memodifikasi application/views/katalog/index.php agar tombol tambah ke keranjang tidak aktif saat belum login dan menambah mobil ke keranjang setelah diklik saat login (belum masuk ke tabel, karena bukan diproses di tahap ini). tahap ini juga menyesuaikan status ketersediaan kendaraan baru tombol tambah ke keranjangnya aktif.
7. Menampilkan flash message dan jumlah mobil aktual serta link ke keranjang menggunakan <?= $e(site_url('transaksi/keranjang')) ?> pada application\views\katalog\n1. avbar.php termasuk menampilkan nilai dari method jumlahKeranjang dari Controller.
8. modifikasi application\models\Transaksi_model.php untuk menambahkan method getJumlahMobilKeranjang().
9. Modifikasi application\controllers\Katalog_controller.php untuk mengirim jumlah keranjang ke halaman katalog dan detail katalog. menambah require_once APPPATH . 'models/Transaksi_model.php';, menambah properti private Transaksi_model $transaksiModel;, menambah inisialisasi model $this->transaksiModel = new Transaksi_model();, 
10. menyesuaikan application\controllers\Penyewa_controller.php untuk mengirim jumlah keranjang karena jumlah keranjang kosong pada profil dengan pemanggilam model menggunakan require_once APPPATH . 'models/Transaksi_model.php'; properti private Transaksi_model $transaksiModel;, inisialisasi model menggunakan $this->transaksiModel = new Transaksi_model();, menambah perhitungan jumlah keranjang dengan $jumlahKeranjang = $this->transaksiModel->getJumlahMobilKeranjang($userPlg); dan mengirim parameter jumlahKeranjang di View Profil, selain itu method renderProfilError() juga mengirim variabel jumlahKeranjang. jadi semua yang memanggil view, dikirimkan variabel jumlahKeranjang.
11. agar zona waktu PHP mengikuti ASIA/Jakarta, maka pada index.php root harus ditambahkan date_default_timezone_set('Asia/Jakarta'); setelah session_start().
12. memodifikasi application\models\Transaksi_model.php untuk menambahkan method namaKunciKeranjang() dan kunciKendaraan(), hitungHariSewa() dan normalisasiWaktu(), tambahKeKeranjang(), kemudian melakukan ujicoba menambahkan mobil ke keranjang.
13. membuat halaman isi keranjang dengan berkas application/views/transaksi/keranjang.php
19. modifikasi method keranjang pada application\controllers\Transaksi_controller.php agar bisa menghandle dengan kode sewa kosong
20. halaman keranjang, khususnya update setelah berhasil dipanggil. format waktu sewa dibuat 24 jam dengan select2.
21. setelah keranjang selesai, lanjut ke checkout. tepatnya model melakukan validasi dan mengubah status transaksi dari keranjang menjadi diajukan menggunakan file application/views/transaksi/konfirmasi.php. selain itu membuat record pembayaran ke tabel t_bayar terkait DP 30%.
23. selesai