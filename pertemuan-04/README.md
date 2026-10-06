# Pertemuan 04 - Pengelolaan Data Admin Sistem dengan MVC

## 1. Tujuan Praktikum

Pertemuan 04 mengembangkan aplikasi MVC dari hasil Pertemuan 03 dengan menambahkan fitur CRUD (Create, Read, Update, Delete) untuk data admin pada tabel `t_admin`. Implementasi tetap menggunakan MySQLi dan prepared statement serta menerapkan validasi input, output escaping, pengendalian akses, PRG (Post/Redirect/Get), flash message, dan antarmuka AdminLTE 2.4.18.

## 2. Baseline P3

Implementasi P4 dikembangkan dari workspace P3, bukan membuat proyek MVC baru.

- Workspace: `C:\laragon\www\dpwl-0344300002\`
- Database: `db_dpwl_nama123`
- Tabel yang dikelola pada P4: `t_admin`
- Primary key: `username`
- Kolom: `username`, `password`, `status_akun`
- `index.php` tetap menjadi front controller.
- `routes.php`, `config.php`, `database.php`, `url_helper.php`, `Auth.php`, `auth_helper.php`, `Admin_model.php`, dan `Admin.php` dari P3 tetap digunakan dan dikembangkan seperlunya.

## 3. Perubahan P4

Perubahan utama pada P4 adalah sebagai berikut.

### 3.1 Controller CRUD baru

Ditambahkan:

`application/controllers/Madmin_controller.php`

Controller ini khusus menangani pengelolaan data admin melalui method:

- `index()` untuk menampilkan daftar admin.
- `tambah()` untuk menampilkan form tambah dan memproses CREATE.
- `ubah($username)` untuk menampilkan form edit dan memproses UPDATE.
- `hapus($username)` untuk memproses DELETE.
- `validateInput()` untuk validasi input proses CRUD.
- `renderMadmin()` untuk menyiapkan data dan memanggil View.

`Admin.php` tetap digunakan untuk dashboard admin dan tidak menangani CRUD data admin.

### 3.2 Pengembangan Model

File:

`application/models/Admin_model.php`

Method yang digunakan pada P4:

- `findByUsername()` untuk mencari admin tertentu dan tetap digunakan dari P3.
- `getAll()` untuk membaca daftar admin.
- `create()` untuk menambah admin.
- `update()` untuk mengubah admin.
- `delete()` untuk menghapus admin.

SQL diletakkan di Model dan menggunakan MySQLi prepared statement.

### 3.3 View pengelolaan admin

Ditambahkan:

`application/views/admin/madmin_view.php`

View ini menjadi satu halaman pengelolaan admin yang memuat:

- tabel daftar admin;
- tombol Tambah;
- tombol Edit;
- tombol Hapus;
- form tambah/ubah di bawah tabel;
- radio button `aktif` dan `nonaktif`;
- validasi/umpan balik yang dikirim Controller;
- output escaping menggunakan `htmlspecialchars()`.

### 3.4 Template reusable

Ditambahkan folder:

`application/views/templates/`

Berisi:

- `header.php`
- `sidebar.php`
- `footer.php`

Template digunakan agar bagian antarmuka yang berulang tidak ditulis kembali pada setiap halaman admin.

### 3.5 Perubahan dashboard admin

File:

`application/views/admin/index.php`

Diperbarui agar menggunakan template `header.php`, `sidebar.php`, dan `footer.php` yang dipisahkan pada P4.

### 3.6 Routes

`application/config/routes.php` dikembangkan dengan route pengelolaan admin:

| Route | Method HTTP | Controller | Tujuan |
|---|---|---|---|
| `/admin` | GET | `Admin::index()` | Dashboard admin |
| `/admin/madmin` | GET | `Madmin_controller::index()` | Daftar admin |
| `/admin/madmin/tambah` | GET | `Madmin_controller::tambah()` | Menampilkan form tambah |
| `/admin/madmin/tambah` | POST | `Madmin_controller::tambah()` | Menyimpan admin baru |
| `/admin/madmin/ubah/:username` | GET | `Madmin_controller::ubah()` | Menampilkan form edit |
| `/admin/madmin/ubah/:username` | POST | `Madmin_controller::ubah()` | Menyimpan perubahan admin |
| `/admin/madmin/hapus/:username` | POST | `Madmin_controller::hapus()` | Menghapus admin |

GET pada route hapus tidak digunakan. Request GET ke route tersebut ditolak dengan HTTP 405.

### 3.7 Helper baru

Ditambahkan:

`application/helpers/flash_helper.php`

Helper ini menyediakan:

- `set_flash_message()` untuk menyimpan pesan sementara sebelum redirect.
- `get_flash_message()` untuk mengambil dan menghapus pesan pada request berikutnya.

`auth_helper.php` dari P3 tetap digunakan untuk `require_admin_login()` pada route CRUD.

### 3.8 DataTables

Tabel admin menggunakan DataTables. Asset CSS dan JavaScript DataTables ditempatkan melalui template `header.php` dan `footer.php`, sedangkan konfigurasi tabel digunakan pada halaman `madmin_view.php`.

Fitur yang digunakan meliputi pencarian, pengurutan, pagination, informasi jumlah data, dan pengaturan bahasa tampilan.

## 4. Aturan Validasi dan Keamanan

- `username` wajib diisi.
- `username` maksimal 15 karakter sesuai struktur `t_admin`.
- `username` diperiksa agar tidak mengandung karakter kontrol.
- `password` saat CREATE wajib diisi.
- `password` saat UPDATE boleh kosong; jika kosong, hash password lama dipertahankan.
- Password disimpan menggunakan `password_hash()` dan tidak disimpan sebagai plaintext.
- `status_akun` hanya boleh bernilai `aktif` atau `nonaktif`.
- Input yang digunakan pada SQL diproses melalui prepared statement.
- Nilai dinamis yang ditampilkan kembali ke HTML menggunakan `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')`.
- Seluruh method CRUD dilindungi `require_admin_login()`.
- Proses POST yang berhasil menggunakan redirect ke `/admin/madmin` sebagai penerapan PRG.
- Penghapusan dilakukan menggunakan POST, bukan GET.

## 5. Struktur Direktori P4

Struktur yang relevan dengan perubahan P4 adalah:

```text
dpwl-0344300002/
├── index.php
├── application/
│   ├── config/
│   │   ├── config.php
│   │   ├── database.php
│   │   └── routes.php
│   ├── controllers/
│   │   ├── Admin.php
│   │   ├── Auth.php
│   │   ├── Home.php
│   │   └── Madmin_controller.php
│   ├── helpers/
│   │   ├── auth_helper.php
│   │   ├── flash_helper.php
│   │   └── url_helper.php
│   ├── models/
│   │   └── Admin_model.php
│   └── views/
│       ├── admin/
│       │   ├── index.php
│       │   └── madmin_view.php
│       ├── auth/
│       │   └── login.php
│       ├── home/
│       │   ├── index.php
│       │   └── info.php
│       └── templates/
│           ├── header.php
│           ├── sidebar.php
│           └── footer.php
├── assets/
│   └── css/
│       └── app.css
└── system/
    └── core/
        ├── Controller.php
        └── Router.php
```

`dokumentasi/` digunakan untuk menyimpan bukti tangkapan layar dan bukan bagian dari runtime aplikasi.

## 6. Alur Request-Response CRUD

### 6.1 Read daftar admin

```text
GET /admin/madmin
        ↓
index.php (Front Controller)
        ↓
Router
        ↓
Madmin_controller::index()
        ↓
Admin_model::getAll()
        ↓
MySQLi prepared statement
        ↓
t_admin
        ↓
madmin_view.php
        ↓
Response HTML
```

### 6.2 Create admin

```text
GET /admin/madmin/tambah
        ↓
Madmin_controller::tambah()
        ↓
madmin_view.php
```

Setelah form dikirim:

```text
POST /admin/madmin/tambah
        ↓
Validasi Controller
        ↓
password_hash()
        ↓
Admin_model::create()
        ↓
INSERT t_admin
        ↓
Flash message
        ↓
Redirect GET /admin/madmin
```

### 6.3 Update admin

```text
GET /admin/madmin/ubah/:username
        ↓
Madmin_controller::ubah()
        ↓
Admin_model::findByUsername()
        ↓
madmin_view.php
```

Setelah form dikirim:

```text
POST /admin/madmin/ubah/:username
        ↓
Validasi Controller
        ↓
password_hash() jika password diisi
        ↓
Admin_model::update()
        ↓
UPDATE t_admin
        ↓
Flash message
        ↓
Redirect GET /admin/madmin
```

### 6.4 Delete admin

```text
POST /admin/madmin/hapus/:username
        ↓
Madmin_controller::hapus()
        ↓
Admin_model::delete()
        ↓
DELETE t_admin
        ↓
Flash message
        ↓
Redirect GET /admin/madmin
```

## 7. Hasil Pengujian

Isi kolom **Hasil Aktual** berdasarkan pengujian yang benar-benar dilakukan. Jangan mengganti hasil aktual dengan hasil yang diharapkan.

| No | Skenario | Request / Input | Hasil Aktual | Bukti |
|---:|---|---|---|---|
| 1 | Dashboard | `GET /admin` | Isi hasil aktual | Screenshot web |
| 2 | Akses dashboard tanpa login | `GET /admin` | Isi hasil aktual | Screenshot web |
| 3 | Daftar admin | `GET /admin/madmin` | Isi hasil aktual | Screenshot web |
| 4 | Akses Madmin tanpa login | `GET /admin/madmin` | Isi hasil aktual | Screenshot web |
| 5 | Form tambah | `GET /admin/madmin/tambah` | Isi hasil aktual | Screenshot web |
| 6 | Tambah admin valid | `POST` username baru + password + status | Isi hasil aktual | Screenshot web + database |
| 7 | Username kosong | `POST` username kosong | Isi hasil aktual | Screenshot web |
| 8 | Username > 15 karakter | `POST` 16+ karakter | Isi hasil aktual | Screenshot web |
| 9 | Karakter kontrol | `POST` username mengandung karakter kontrol | Isi hasil aktual | Screenshot web |
| 10 | Duplikasi username | `POST` username yang sudah ada | Isi hasil aktual | Screenshot web; database opsional |
| 11 | Status tidak valid | `POST` nilai selain `aktif/nonaktif` | Isi hasil aktual | Screenshot web |
| 12 | Edit status | `GET` form, lalu `POST` perubahan | Isi hasil aktual | Screenshot web + database |
| 13 | Edit password | `POST` password baru | Isi hasil aktual | Screenshot web + database |
| 14 | Edit tanpa password | `POST` password kosong | Isi hasil aktual | Screenshot web + database sebelum/sesudah |
| 15 | Hapus admin valid | `POST /admin/madmin/hapus/:username` | Isi hasil aktual | Screenshot web + database |
| 16 | GET route hapus | `GET /admin/madmin/hapus/:username` | Isi hasil aktual | Screenshot web |
| 17 | Tombol aksi tabel | Klik Edit dan Hapus | Isi hasil aktual | Screenshot web |
| 18 | DataTables | Pencarian, sort, pagination | Isi hasil aktual | Screenshot web |

### Catatan bukti database

Screenshot database digunakan terutama untuk pengujian yang mengubah data `t_admin`, yaitu tambah, update, dan hapus. Untuk pengujian password, yang perlu dibuktikan adalah bahwa database menyimpan hash, bukan plaintext. Jangan menampilkan password asli pada dokumentasi.

## 8. Debugging

Tuliskan masalah yang benar-benar ditemukan selama implementasi. Contoh format:

| Masalah | Penyebab | Perbaikan | Hasil uji ulang |
|---|---|---|---|
| Isi berdasarkan debugging aktual | Isi berdasarkan penyebab aktual | Isi perubahan yang dilakukan | Isi hasil pengujian ulang |

Titik pemeriksaan yang relevan dengan P4:

- Route `/admin/madmin` → `Madmin_controller::index()` → `Admin_model::getAll()` → `madmin_view.php`.
- CREATE → validasi Controller → `create()` pada Model.
- UPDATE → route username → validasi status/password → `update()` pada Model.
- DELETE → POST → `Madmin_controller::hapus()` → `delete()` pada Model.
- HTTP 405 → periksa method request dan pembatasan method pada Controller.
- Redirect → periksa `header('Location: ...')`, output sebelum `header()`, dan `exit` setelah redirect.
- Flash message → periksa `set_flash_message()`, redirect, dan `get_flash_message()`.
- Akses tanpa login → periksa `require_admin_login()` dan session autentikasi admin.

## 9. Bukti Tangkapan Layar

Simpan screenshot pada folder `dokumentasi/` dan gunakan nama file yang konsisten. Contoh:

```text
dokumentasi/
├── 01-dashboard.png
├── 02-madmin.png
├── 03-tambah-admin.png
├── 04-tambah-berhasil.png
├── 05-validasi.png
├── 06-edit-admin.png
├── 07-hapus-admin.png
├── 08-databases.png
└── 09-datatables.png
```

Jangan menambahkan screenshot yang tidak benar-benar menunjukkan hasil pengujian P4.

## 10. Git dan Version Control

P4 dilanjutkan pada repositori yang sama. Pastikan snapshot P4 sudah diuji sebelum commit dan push.

Periksa perubahan:

```bash
git status
git status --short
git diff --stat
```

Periksa histori P4:

```bash
git log --since="1 hour ago" --oneline --name-status
```

Commit dokumentasi dan artefak P4, misalnya:

```bash
git add pertemuan-04
git commit -m "feat(p4): implement crud data admin"
git push
```

Gunakan pesan commit yang sesuai dengan perubahan aktual. Jangan mencantumkan hash commit atau hasil push sebelum benar-benar dilakukan.

## 11. Kesimpulan

Pertemuan 04 mengembangkan fondasi P3 menjadi pengelolaan data admin berbasis MVC. CRUD pada tabel `t_admin` dipisahkan ke `Madmin_controller.php`, sedangkan `Admin.php` tetap menangani dashboard admin. `Admin_model.php` bertanggung jawab terhadap SQL dan akses data, `madmin_view.php` menangani tabel serta form CRUD, dan bagian tampilan berulang dipindahkan ke template `header.php`, `sidebar.php`, dan `footer.php`.

Implementasi juga menerapkan validasi sisi server, password hashing, prepared statement, output escaping, pengendalian akses, flash message, dan PRG. Keberhasilan P4 dibuktikan melalui hasil pengujian aktual, screenshot, dokumentasi debugging, serta histori Git/GitHub.
