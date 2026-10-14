# Pertemuan-05

Pengembangan yang dilakukan:
1. menambah menu Manajemen Kendaraan di sidebar.php, menambah route untuk controller Mobil_controller khusus method index di routes.php
2. menambah route ke controller Mobil untuk method tambah, ubah, hapus di routes.php
3. membuat berkas application/models/Mobil_model.php untuk operasi CRUD tabel t_mobil.
4. menambahkan method getAll() untuk membaca seluruh data mobil pada application/models/Mobil_model.php
5. membuat application\controllers\Mobil_controller.php dan memuat models/Mobil_model.php, helpers/auth_helper.php, dan helpers/flash_helper.php
6. membuat view untuk daftar mobil di application\views\admin\mobil_view.php, tambah, ubah, hapus di tahap selanjutnya.
7. membuat method create() di application\models\Mobil_model.php.
8. membuat method tambah(), hapusFotoBaru(), uploadFoto(), validateMobilInput(), renderMobil() di application\controllers\Mobil_controller.php
9. membuat formulir tambah kendaraan di application\views\admin\mobil_view.php.
10. mencoba menambahkan data kendaraan baru pada manajemen data kendaraan. berhasil.
11. menambahkan method findByNoPlat() di application\models\Mobil_model.php untuk menampilkan data kendaraan yang dipilih pada form.
12. menambahkan method update() di application\models\Mobil_model.php untuk melakukan query update terhadap t_mobil dimana no_plat sesuai yang dipilih.
13. Menambahkan method ubah() di application\controllers\Mobil_controller.php
