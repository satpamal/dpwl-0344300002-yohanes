# Pertemuan 03 - Fondasi Aplikasi MVC

Praktikum Desain dan Pemrograman Web Lanjutan (IS203), P3. Implementasi merupakan pengembangan dari fondasi MVC P2 dengan menambahkan koneksi MySQLi, Model, autentikasi admin, session, pengendalian akses, logout, dan integrasi AdminLTE 2.4.18.

## 1. Identitas

- **Mata Kuliah:** IS203 - Desain dan Pemrograman Web Lanjutan
- **Pertemuan:** 03 (P3)
- **NIM:** 0344300002
- **Nama:** Yohanes Setiawan Japriadi
- **Workspace latihan:** `C:\laragon\www\dpwl-0344300002\`
- **Repositori lokal:** `C:\laragon\www\dpwl-0344300002-yohanes\`

> README ini ditujukan untuk folder `pertemuan-03/` pada repositori GitHub.

## 2. Tujuan Praktikum

P3 mengembangkan fondasi MVC P2 menjadi aplikasi yang sudah memiliki:

- koneksi basis data MySQLi;
- Model untuk mengakses tabel `t_admin` menggunakan prepared statement;
- autentikasi login admin;
- validasi input sisi peladen;
- penyimpanan password menggunakan hash bcrypt;
- manajemen session;
- pengendalian akses halaman admin;
- logout;
- integrasi View dengan AdminLTE 2.4.18;
- pengujian, debugging, dokumentasi, dan version control Git/GitHub.

## 3. Struktur Direktori

```text
pertemuan-03/
├── application/
│   ├── config/
│   │   ├── config.php
│   │   ├── database.php
│   │   └── routes.php
│   ├── controllers/
│   │   ├── Admin.php
│   │   ├── Auth.php
│   │   └── Home.php
│   ├── helpers/
│   │   ├── auth_helper.php
│   │   └── url_helper.php
│   ├── models/
│   │   └── Admin_model.php
│   └── views/
│       ├── admin/index.php
│       ├── auth/login.php
│       └── home/
├── assets/
│   └── css/app.css
├── dokumentasi/
│   ├── Gambar 1.jpg
│   ├── Gambar 2.jpg
│   ├── Gambar 3.jpg
│   ├── Gambar 4.jpg
│   └── Gambar 5.jpg
├── images/
├── system/
│   └── core/
│       ├── Controller.php
│       └── Router.php
├── generate_hash.php
├── generatestrukturdirektorifile.php
├── index.php
└── README.md
```

`system/core/Controller.php`, `system/core/Router.php`, `index.php`, `config.php`, `routes.php`, `url_helper.php`, dan `Home.php` merupakan fondasi yang diteruskan dari P2. P3 menambahkan `database.php`, `Admin_model.php`, `Auth.php`, `Admin.php`, `auth_helper.php`, serta View login dan admin.

## 4. Konfigurasi Basis Data

Aplikasi menggunakan MySQL melalui MySQLi.

| Komponen | Nilai |
|---|---|
| Host | `localhost` |
| Port | `3306` |
| Username | `root` |
| Password | kosong pada lingkungan Laragon P3 |
| Database | `db_dpwl_nama123` |
| Tabel | `t_admin` |
| Driver | `MySQLi` |
| Charset koneksi | `utf8mb4` |

Struktur `t_admin`:

```text
username       varchar(15) PRIMARY KEY
password       char(60)
status_akun    enum('aktif','nonaktif') DEFAULT 'nonaktif'
```

Password pada kolom `password` disimpan sebagai hash bcrypt, bukan sebagai password plainteks.

## 5. Model dan Prepared Statement

`application/models/Admin_model.php` bertanggung jawab mengambil data akun dari `t_admin`. Controller tidak melakukan query SQL secara langsung.

Bagian penting pada Model:

```php
$sql = "
  SELECT username, password, status_akun
  FROM t_admin
  WHERE username = ?
  LIMIT 1
";

$stmt = $this->db->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
```

Prepared statement digunakan agar nilai username diperlakukan sebagai parameter query, bukan digabungkan langsung ke SQL.

## 6. Autentikasi, Password, dan Session

`application/controllers/Auth.php` menangani dua proses utama:

### Login

- GET menampilkan View login.
- POST membaca `username` dan `password`.
- `username` dinormalisasi dengan `trim()` dan divalidasi terhadap batas `varchar(15)`.
- Akun diminta melalui `Admin_model`.
- Status akun harus `aktif`.
- Password diverifikasi menggunakan `password_verify()`.
- Setelah berhasil, session ID diregenerasi dengan `session_regenerate_id(true)`.
- Session menyimpan:

```php
$_SESSION['admin_username'] = $admin['username'];
$_SESSION['admin_status'] = $admin['status_akun'];
```

Password dan hash password tidak disimpan ke dalam session.

### Logout

Logout hanya menerima method POST. Session dikosongkan dan dihancurkan, kemudian pengguna diarahkan kembali ke halaman login.

## 7. Pengendalian Akses dan Logout

`application/helpers/auth_helper.php` menyediakan dua fungsi:

```php
function is_admin_logged_in(): bool
{
  return isset($_SESSION['admin_username'])
    && ($_SESSION['admin_status'] ?? '') === 'aktif';
}

function require_admin_login(): void
{
  if (!is_admin_logged_in()) {
    header('Location: ' . site_url('auth/login'));
    exit;
  }
}
```

`application/controllers/Admin.php` memanggil `require_admin_login()` sebelum menampilkan halaman admin. Dengan demikian, halaman `/admin` tidak dapat langsung digunakan oleh pengguna yang belum memiliki session autentikasi yang valid.

## 8. Integrasi AdminLTE 2.4.18

AdminLTE tidak disalin seluruhnya ke dalam aplikasi. Template tetap berada pada lokasi eksternal:

```text
C:\laragon\www\template\AdminLTE-2.4.18\
```

View P3 membentuk URL aset menggunakan `base_url()` kemudian melakukan output escaping dengan `htmlspecialchars()`.

View yang menggunakan AdminLTE:

- `application/views/auth/login.php`
- `application/views/admin/index.php`

Username yang tampil pada dashboard berasal dari session dan diteruskan oleh Controller ke View menggunakan parameter `$username`.

Contoh output escaping:

```php
<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>
```

Gambar profil menggunakan aset bawaan AdminLTE:

```php
<img src="<?= $adminlte_url . 'dist/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Image">
```

## 9. Routing dan Pemetaan URL

Route yang digunakan pada P3:

| URL/Route | Controller | Method | Keterangan |
|---|---|---|---|
| `/` | `Home` | `index()` | Halaman awal P2 |
| `/info/(:any)` | `Home` | `info($topik)` | Route parameter P2 |
| `/login` | `Auth` | `login()` | Halaman login |
| `/auth/login` | `Auth` | `login()` | Endpoint login |
| `/auth/logout` | `Auth` | `logout()` | Endpoint logout |
| `/admin` | `Admin` | `index()` | Halaman admin terproteksi |

`index.php` tetap menjadi satu-satunya front controller. Router P2 tetap memetakan URI ke Controller dan method.

## 10. Modifikasi ATM P3

Modifikasi minimal yang digunakan sebagai contoh P3 adalah route terproteksi untuk informasi admin:

```php
$route['admin/info/(:any)'] = 'admin/info/$1';
```

Controller:

```php
public function info(string $topik = 'mvc'): void
{
  require_once APPPATH . 'helpers/auth_helper.php';
  require_admin_login();

  $this->view('admin/info', [
    'username' => $_SESSION['admin_username'],
    'topik' => $topik
  ]);
}
```

View `admin/info.php` menampilkan `$topik` menggunakan `htmlspecialchars()`.

> Ganti contoh di atas dengan route, method, dan View yang benar-benar dibuat pada implementasi mahasiswa sebelum pengumpulan.

## 11. Hasil Pengujian dan Debugging

Skenario pengujian utama P3:

| Skenario | Hasil yang diharapkan |
|---|---|
| Membuka `/login` | Form login AdminLTE tampil |
| Login dengan akun valid | Session terbentuk dan diarahkan ke `/admin` |
| Username/password tidak valid | Pesan kesalahan ditampilkan |
| Status akun `nonaktif` | Login ditolak |
| Mengakses `/admin` tanpa session | Diarahkan kembali ke login |
| Mengakses `/admin` setelah login | Dashboard admin tampil |
| Logout | Session berakhir dan diarahkan ke login |
| Mengakses `/admin` setelah logout | Diarahkan kembali ke login |

Bukti tangkapan layar yang tersedia pada folder `dokumentasi/` berasal dari hasil pengerjaan P3:

- **Gambar 1** - halaman login dan pemeriksaan pemuatan aset melalui browser.
- **Gambar 2** - tampilan halaman login AdminLTE.
- **Gambar 3** - login dengan kredensial tidak sesuai dan pesan kesalahan.
- **Gambar 4** - halaman dashboard admin setelah login.
- **Gambar 5** - dashboard admin dan pemeriksaan pemuatan request/aset.

## 12. Bukti Tangkapan Layar

### Gambar 1 - Login dan pemeriksaan aset

![Gambar 1](dokumentasi/Gambar%201.jpg)

### Gambar 2 - Halaman Login AdminLTE

![Gambar 2](dokumentasi/Gambar%202.jpg)

### Gambar 3 - Login Tidak Valid

![Gambar 3](dokumentasi/Gambar%203.jpg)

### Gambar 4 - Dashboard Admin

![Gambar 4](dokumentasi/Gambar%204.jpg)

### Gambar 5 - Dashboard dan pemeriksaan aset

![Gambar 5](dokumentasi/Gambar%205.jpg)

## 13. Berkas Pendukung

`generate_hash.php` digunakan untuk menghasilkan hash password `admin` secara lokal ketika menyiapkan data awal P3. Berkas ini sebaiknya dipahami sebagai alat bantu praktikum dan tidak digunakan sebagai mekanisme penyimpanan password pada aplikasi produksi.

`generatestrukturdirektorifile.php` digunakan untuk menampilkan struktur direktori proyek.

## 14. Kesimpulan P3

P3 mengembangkan fondasi MVC P2 menjadi aplikasi yang sudah dapat mengakses basis data melalui Model, melakukan autentikasi admin, menjaga status login dengan session, membatasi akses ke halaman administrasi, melakukan logout, dan menampilkan antarmuka AdminLTE. Pemisahan tanggung jawab tetap dipertahankan: Model mengelola akses data, Controller mengatur alur proses, dan View menyajikan antarmuka.

Batas P3 adalah autentikasi dan fondasi aplikasi. CRUD data admin tidak menjadi materi P3 dan dilanjutkan pada pertemuan berikutnya sesuai urutan RPS.

## 15. Version Control

Perubahan P3 dikomit sebagai kelanjutan histori P1 dan P2. Contoh perintah:

```bash
cd C:\laragon\www\dpwl-0344300002-yohanes
git status
git add pertemuan-03
git commit -m "P3: implementasi model dan autentikasi admin"
git push
git log --oneline --decorate -5
git status
```

Akun uji `admin / admin` hanya digunakan untuk lingkungan praktikum lokal P3. Jangan menggunakan kredensial tersebut untuk aplikasi produksi.
