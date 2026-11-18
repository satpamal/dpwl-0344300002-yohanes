# Pertemuan 10

pada P10, saya mengembangkan, menguji:

1. menyalin artefak P9 sebagai baseline P10, kemudian mengujinya melalui url http://localhost/dpwl-nim/. Setelah menguji, aplikasi dapat dijalankan sama seperti pada P9.
2. selain itu saya menguji login admin, dan hasilnya halaman administrasi atau dasbor admin dapat ditampilkan.
3. saya juga menguji login penyewa, dan halaman penyewa dapat ditampilkan.
4. saya juga menguji daftar transaksi dan detail transaksi yang masih berfungsi dengan baik.
5. saat mencoba proses pembayaran uang muka (DP) dan proses pengunggahan bukti pembayaran DP juga masih berfungsi dengan baik.
6. saya juga memeriksa proses verifikasi pembayaran DP oleh admin yang masih berfungsi dengan baik.
7. selain itu, saat mencoba melakukan verifikasi pembayaran dp, fiturnya masih berfungsi.
8. saya mengecek informasi kendaraan pada detail transaksi yang pembayaran dp nya sudah diverifikasi dengan hasil pengujian informasi tersebut tetap dapat ditampilkan.
9. saya melakukan perubahan struktur pada tabel t_sewa, kolom status_sewa dengan menambahkan nilai 'lunas' pada ENUM.
10. menambahkan method getDaftarPelunasan() di application\models\Pembayaran_model.php untuk mengambil daftar transaksi yang memenuhi syarat pelunasan.
11. menambahkan method getDetailPelunasan(string $kodeSewa) di application\models\Pembayaran_model.php untuk mengambil detail transaksi dan riwayat pembayaran.
12. menambahkan method buatKodeBayarPelunasan(string $tanggalKode) di application\models\Pembayaran_model.php untuk membuat kode pembayaran pelunasan.
13. menambahkan method simpanPelunasan() di application\models\Pembayaran_model.php untuk menghitung sisa kewajiban dan memvalidasi pelunasan.
14. menguji model pelunasan dengan pemeriksaan terhadap method yang telah dibuat.
15. Menampilkan daftar transaksi yang masih memiliki kewajiban pelunasan dengan method pelunasanIndex() di file application\controllers\Pembayaran_controller.php.
16. menampilkan detail transaksi, riwayat pembayaran, dan sisa kewajiban dengan method pelunasanDetail(string $kodeSewa) di application\controllers\Pembayaran_controller.php.
17. mencatat pembayaran pelunasan yang diterima langsung oleh admin dengan menambahkan method prosesPelunasan(string $kodeSewa) di application\controllers\Pembayaran_controller.php
18. menampilkan dokumen transaksi yang siap dicetak dengan method dokumenTransaksi(string $kodeSewa) di application\controllers\Pembayaran_controller.php.
19. melakukan pemeriksaan awal terhadap Controller Pembayaran (application\controllers\Pembayaran_controller.php).
20.
