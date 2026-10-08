# Pertemuan 04 - Pengelolaan Data Admin Sistem dengan MVC

## 1. Tujuan

Pertemuan 04 mengembangkan aplikasi MVC dari baseline Pertemuan 03 dengan menambahkan fitur CRUD (Create, Read, Update, Delete) data admin pada tabel `t_admin`.

Implementasi menggunakan MySQLi dan prepared statement serta menerapkan validasi, sanitasi sesuai konteks, output escaping, pengendalian akses, Post-Redirect-Get (PRG), flash message, dan AdminLTE 2.4.18.

P4 dikembangkan secara kumulatif dari P3 dan tidak membuat proyek MVC baru.

---

## 2. Perubahan P4

Perubahan utama pada P4:

- `Admin_model.php` dikembangkan untuk membaca, menambah, mengubah, dan menghapus data `t_admin`.
- `Madmin_controller.php` ditambahkan untuk menangani proses CRUD data admin.
- `madmin_view.php` ditambahkan sebagai View pengelolaan data admin.
- `header.php`, `sidebar.php`, dan `footer.php` digunakan sebagai template View yang reusable.
- `routes.php` dikembangkan untuk route pengelolaan data admin.
- `flash_helper.php` digunakan untuk umpan balik proses melalui flash message.
- `auth_helper.php` dari P3 tetap digunakan untuk pengendalian akses.
- `Admin.php` tetap digunakan untuk dashboard admin dan tidak menangani proses CRUD.

---

## 3. Implementasi MVC

### Model

File:

`application/models/Admin_model.php`

Method yang digunakan pada P4:

- `findByUsername()` — tetap digunakan dari P3.
- `getAll()` — membaca data admin.
- `create()` — menambah data admin.
- `update()` — mengubah data admin.
- `delete()` — menghapus data admin.

SQL untuk pengelolaan `t_admin` berada pada Model dan menggunakan MySQLi prepared statement.

### Controller

File:

`application/controllers/Madmin_controller.php`

Controller menangani:

- proses CRUD;
- validasi dan sanitasi input;
- pengendalian akses;
- PRG;
- umpan balik proses.

### View

File:

`application/views/admin/madmin_view.php`

View menampilkan:

- daftar data admin;
- form tambah dan ubah;
- tombol aksi;
- pesan umpan balik;
- output escaping menggunakan `htmlspecialchars()`.

Antarmuka menggunakan AdminLTE 2.4.18.

---

## 4. Pengendalian Akses dan PRG

Seluruh route pengelolaan data admin dilindungi dengan `require_admin_login()`.

Proses POST yang berhasil menggunakan pola:

```text
POST
 ↓
Proses CRUD
 ↓
Flash message
 ↓
Redirect
 ↓
GET /admin/madmin
```

Penghapusan data admin dilakukan melalui `POST`, bukan `GET`.

---

## 5. Pengujian

Isi kolom **Hasil Aktual** berdasarkan pengujian yang benar-benar dilakukan.

| No. | Skenario                   | Request/Input                        | Hasil Aktual     | Bukti                 |
| --: | -------------------------- | ------------------------------------ | ---------------- | --------------------- |
|   1 | Dashboard admin            | `GET /admin`                         | Isi hasil aktual | Screenshot            |
|   2 | Akses tanpa login          | `GET /admin/madmin`                  | Isi hasil aktual | Screenshot            |
|   3 | Menampilkan data admin     | `GET /admin/madmin`                  | Isi hasil aktual | Screenshot            |
|   4 | Form tambah                | `GET /admin/madmin/tambah`           | Isi hasil aktual | Screenshot            |
|   5 | Tambah admin valid         | `POST` data valid                    | Isi hasil aktual | Screenshot + database |
|   6 | Validasi input tidak valid | `POST` data tidak valid              | Isi hasil aktual | Screenshot            |
|   7 | Username duplikat          | `POST` username yang sudah ada       | Isi hasil aktual | Screenshot            |
|   8 | Ubah data admin            | `POST` data perubahan                | Isi hasil aktual | Screenshot + database |
|   9 | Hapus admin                | `POST /admin/madmin/hapus/:username` | Isi hasil aktual | Screenshot + database |
|  10 | Akses method tidak sesuai  | `GET` pada route hapus               | Isi hasil aktual | Screenshot            |

Tambahkan skenario lain apabila memang diperlukan berdasarkan pengujian aktual.

### Bukti database

Screenshot database digunakan apabila diperlukan untuk membuktikan perubahan data `t_admin`, khususnya pada proses tambah, ubah, dan hapus.

Password tidak boleh ditampilkan sebagai plaintext dalam dokumentasi.

---

## 6. Debugging

Catat hanya masalah yang benar-benar ditemukan selama pengembangan P4.

| Masalah                          | Penyebab                        | Perbaikan                    | Hasil Pengujian Ulang |
| -------------------------------- | ------------------------------- | ---------------------------- | --------------------- |
| Isi berdasarkan debugging aktual | Isi berdasarkan penyebab aktual | Isi perbaikan yang dilakukan | Isi hasil aktual      |

Jika tidak ditemukan masalah tertentu, tidak perlu membuat catatan debugging fiktif.

---

## 7. Dokumentasi dan Git/GitHub

P4 dikembangkan pada repositori yang sama dengan pertemuan sebelumnya.

Dokumentasikan:

- perubahan utama P4;
- hasil pengujian aktual;
- bukti pengujian yang relevan;
- masalah dan perbaikan yang benar-benar terjadi;
- histori commit P4;
- hasil push ke GitHub.

Gunakan pesan commit yang menggambarkan perubahan aktual.

Contoh:

```text
feat(p4): tambah crud data admin
feat(p4): tambah controller pengelolaan admin
feat(p4): tambah view pengelolaan admin
test(p4): uji crud dan access control
docs(p4): perbarui readme pertemuan 04
```

Jangan mencantumkan hash commit, hasil push, atau hasil pengujian yang belum benar-benar dilakukan.

---

## 8. Kesimpulan

Pertemuan 04 mengembangkan baseline P3 menjadi pengelolaan data admin berbasis MVC.

P4 menghasilkan implementasi CRUD `t_admin` dengan pemisahan tanggung jawab Model, View, dan Controller serta menerapkan validasi, prepared statement, output escaping, pengendalian akses, PRG, dan umpan balik proses.

Hasil pengujian, debugging, dokumentasi, serta histori Git/GitHub menjadi bukti pengembangan P4.
