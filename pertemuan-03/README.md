### Verifikasi Baseline P2

#### Kondisi Komponen P2

| Komponen                           | Kondisi Aktual                  | Keterangan  |
| ---------------------------------- | ------------------------------- | ----------- |
| `application/config/config.php`    | `[isi berdasarkan pemeriksaan]` | `[catatan]` |
| `application/config/routes.php`    | `[isi berdasarkan pemeriksaan]` | `[catatan]` |
| `application/controllers/Home.php` | `[isi berdasarkan pemeriksaan]` | `[catatan]` |
| `index.php`                        | `[isi berdasarkan pemeriksaan]` | `[catatan]` |

#### Pengujian Route P2 Sebelum Perubahan P3

| Item             | Hasil Aktual                |
| ---------------- | --------------------------- |
| Route yang diuji | `[route aktual]`            |
| Controller       | `[Controller aktual]`       |
| Method           | `[method aktual]`           |
| Hasil akses      | `[hasil aktual]`            |
| Status           | `[BERHASIL/TIDAK BERHASIL]` |
| Catatan          | `[jika ada]`                |

#### Kesimpulan

Baseline P2 dinyatakan `[SIAP/TIDAK SIAP]` untuk dikembangkan pada P3.

Catatan: seluruh isi bagian ini harus berdasarkan pemeriksaan dan pengujian
yang benar-benar dilakukan mahasiswa pada workspace P3. Jangan mengisi
hasil berdasarkan contoh, asumsi, atau hasil pengujian yang belum dilakukan.

### Verifikasi Basis Data P3

#### Hasil Pemeriksaan Basis Data

| Item            | Hasil Aktual                       |
| --------------- | ---------------------------------- |
| Nama basis data | `[nama basis data yang diperiksa]` |
| Host MySQL      | `[host aktual]`                    |
| Port MySQL      | `[port aktual]`                    |
| Tabel           | `[nama tabel yang diperiksa]`      |
| Primary Key     | `[hasil pemeriksaan]`              |
| Engine          | `[hasil pemeriksaan]`              |
| Charset         | `[hasil pemeriksaan]`              |
| Collation       | `[hasil pemeriksaan]`              |

#### Struktur t_admin

| Kolom         | Tipe Data                  | Hasil Pemeriksaan       |
| ------------- | -------------------------- | ----------------------- |
| `username`    | `varchar(15)`              | `[sesuai/tidak sesuai]` |
| `password`    | `char(60)`                 | `[sesuai/tidak sesuai]` |
| `status_akun` | `enum('aktif','nonaktif')` | `[sesuai/tidak sesuai]` |

Kesimpulan:
Struktur basis data dan tabel t_admin dinyatakan `[SESUAI/TIDAK SESUAI]`
dengan struktur yang ditetapkan untuk P3.

Catatan: seluruh isi harus berdasarkan pemeriksaan aktual melalui phpMyAdmin.
Jangan menuliskan hasil yang belum diperiksa.

### Verifikasi Data Awal Akun Admin

Catat hasil aktual pemeriksaan data akun `admin` pada `pertemuan-03/README.md`.

| Item                                | Hasil Aktual     | Status                  |
| ----------------------------------- | ---------------- | ----------------------- |
| Username `admin` tersedia           | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| `status_akun` bernilai `aktif`      | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| Kolom `password` berisi hash bcrypt | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| Password plainteks tidak disimpan   | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |

Kesimpulan:

Data awal akun `admin` `[sesuai/tidak sesuai]` dengan kebutuhan
autentikasi P3.

Catatan: hasil harus dicatat berdasarkan pemeriksaan aktual pada
phpMyAdmin, bukan berdasarkan hasil yang diharapkan.

### Pengujian Koneksi Basis Data

| Item            | Hasil Aktual                                             |
| --------------- | -------------------------------------------------------- |
| Berkas koneksi  | `application/config/database.php`                        |
| Host            | `[hasil aktual]`                                         |
| Port            | `[hasil aktual]`                                         |
| Basis data      | `[hasil aktual]`                                         |
| Hasil pengujian | `[Koneksi basis data berhasil/Koneksi basis data gagal]` |
| Catatan         | `[jika ada]`                                             |

Kesimpulan:
Koneksi basis data `[BERHASIL/TIDAK BERHASIL]` dan siap digunakan oleh Model.

Catatan: hasil yang dicatat harus berdasarkan pengujian yang benar-benar
dilakukan. Jangan menuliskan hasil berdasarkan contoh atau asumsi.

### Pengujian Model `Admin_model`

| Skenario             | Username          | Hasil Aktual     | Status                  |
| -------------------- | ----------------- | ---------------- | ----------------------- |
| Data ditemukan       | `admin`           | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| Data tidak ditemukan | `admin_tidak_ada` | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |

Kesimpulan:

Method `findByUsername()` `[berhasil/tidak berhasil]` mengambil data
berdasarkan username menggunakan prepared statement.

Catatan: hasil yang dicatat harus berdasarkan pengujian yang benar-benar
dilakukan, bukan berdasarkan hasil yang diharapkan.

### Dokumentasi Pengujian View dan Aset AdminLTE

Catat hasil aktual pengujian pada `pertemuan-03/README.md`.

Gunakan format berikut:

#### Pengujian Sebelum Penyesuaian URL Aset

| Item                            | Hasil Aktual     | Status                  |
| ------------------------------- | ---------------- | ----------------------- |
| Halaman login dapat ditampilkan | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| `bootstrap.min.css`             | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| `font-awesome.min.css`          | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| `ionicons.min.css`              | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| `AdminLTE.min.css`              | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| `blue.css`                      | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| `jquery.min.js`                 | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| `bootstrap.min.js`              | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| `icheck.min.js`                 | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |

#### Pengujian Setelah Penyesuaian URL Aset

| Item                                            | Hasil Aktual     | Status                  |
| ----------------------------------------------- | ---------------- | ----------------------- |
| Halaman login dapat ditampilkan                 | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| URL aset mengarah ke AdminLTE eksternal         | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| Tidak terdapat respons 404 pada aset yang diuji | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
| Tampilan AdminLTE termuat                       | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |

Kesimpulan:

Hasil pengujian View dan pemuatan aset AdminLTE `[berhasil/tidak berhasil]`
setelah URL resource disesuaikan menggunakan `$adminlte_url`.

Catatan: dokumentasi harus berisi hasil aktual dari pengujian yang dilakukan.

### Pengujian Controller Auth

| No. | Skenario Pengujian                      | Hasil Aktual     | Status                  |
| --: | --------------------------------------- | ---------------- | ----------------------- |
|   1 | GET `/auth/login`                       | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   2 | Method selain GET/POST ke `/auth/login` | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   3 | POST username kosong                    | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   4 | POST password kosong                    | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   5 | Username/password tidak sesuai          | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   6 | Login `admin` dengan password `admin`   | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   7 | Session terbentuk setelah login         | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   8 | Redirect setelah login                  | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   9 | GET `/auth/logout`                      | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|  10 | POST `/auth/logout`                     | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |

Kesimpulan:

Implementasi Controller Auth `[berhasil/belum berhasil]` berdasarkan hasil
pengujian aktual yang telah dilakukan.

Jika ditemukan masalah, dokumentasikan masalah dan perbaikannya sebelum
menetapkan implementasi Auth.php sebagai selesai.

### Perlindungan Input Sesuai Konteks

Pada autentikasi, perlindungan input tidak dilakukan dengan mengubah semua
nilai masukan secara generik.

Username dapat dinormalisasi menggunakan `trim()` dan kemudian divalidasi
sesuai aturan aplikasi. Karakter kontrol ditolak melalui validasi. Password
tidak diubah atau dipangkas karena nilai password harus dipertahankan sesuai
input pengguna untuk proses `password_verify()`.

Perlindungan selanjutnya dilakukan sesuai konteks penggunaan data:

1. **Konteks validasi**  
   Controller menentukan apakah input memenuhi aturan aplikasi.

2. **Konteks basis data**  
   Model menggunakan prepared statement sehingga nilai username tidak
   digabungkan langsung ke dalam string SQL.

3. **Konteks HTML**  
   Data yang ditampilkan kembali oleh View menggunakan
   `htmlspecialchars()` sebagai output escaping.

Dengan pendekatan tersebut, perlindungan input tidak dipahami sebagai
penghapusan karakter secara sembarangan, tetapi sebagai penerapan mekanisme
keamanan yang sesuai dengan konteks penggunaan data.

### Implementasi View Awal Admin — M.1

Pada M.1 telah dikembangkan View awal halaman admin menggunakan AdminLTE 2.4.18 berdasarkan Controller Admin yang telah dibangun pada tahap sebelumnya.

#### Komponen yang Dikembangkan

| Komponen                                            | Kondisi Aktual              | Keterangan  |
| --------------------------------------------------- | --------------------------- | ----------- |
| Sumber template AdminLTE 2.4.18                     | `[hasil aktual]`            | `[catatan]` |
| `application/views/admin/index.php`                 | `[tersedia/belum tersedia]` | `[catatan]` |
| Integrasi aset CSS AdminLTE                         | `[hasil aktual]`            | `[catatan]` |
| Integrasi aset JavaScript AdminLTE                  | `[hasil aktual]`            | `[catatan]` |
| Penerimaan `username` dari Controller               | `[hasil aktual]`            | `[catatan]` |
| Output `username` menggunakan `htmlspecialchars()`  | `[hasil aktual]`            | `[catatan]` |
| Navigasi/tautan demo AdminLTE yang tidak diperlukan | `[hasil aktual]`            | `[catatan]` |

#### Verifikasi View

| No. | Skenario Pengujian                                                           | Hasil Aktual     | Status                  |
| --: | ---------------------------------------------------------------------------- | ---------------- | ----------------------- |
|   1 | View halaman admin dapat ditampilkan                                         | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   2 | Template AdminLTE 2.4.18 termuat                                             | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   3 | Aset CSS termuat dengan benar                                                | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   4 | Aset JavaScript termuat dengan benar                                         | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   5 | Username dari Controller ditampilkan pada View                               | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   6 | Username ditampilkan menggunakan `htmlspecialchars()`                        | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   7 | Tidak terdapat tautan demo AdminLTE yang digunakan sebagai navigasi aplikasi | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |

#### Perbaikan

Jika ditemukan masalah pada saat verifikasi, dokumentasikan perbaikan yang dilakukan.

| Masalah yang Ditemukan | Perbaikan yang Dilakukan | Hasil Setelah Perbaikan |
| ---------------------- | ------------------------ | ----------------------- |
| `[jika ada]`           | `[perbaikan aktual]`     | `[hasil aktual]`        |

Jika tidak ditemukan masalah, tuliskan:

> Tidak ditemukan masalah pada saat verifikasi M.1.

#### Kesimpulan M.1

Implementasi View awal halaman admin pada M.1 dinyatakan:

**`[SELESAI/BELUM SELESAI]`**

berdasarkan hasil implementasi dan pengujian aktual.

Catatan: seluruh isi bagian ini harus berdasarkan implementasi dan pengujian yang benar-benar dilakukan mahasiswa. Jangan menuliskan hasil berdasarkan contoh, asumsi, atau hasil pengujian yang belum dilakukan.

### Integrasi Route P3

Pada tahap ini dilakukan integrasi route untuk komponen autentikasi
dan halaman administrasi.

Route yang ditambahkan:

- /login → route login → Controller Auth, method login
- /auth/login → route auth/login → Controller Auth, method login
- /auth/logout → route auth/logout → Controller Auth, method logout
- /admin → route admin → Controller Admin, method index

index.php tetap digunakan sebagai satu-satunya front controller aplikasi.

Pengujian integrasi route dilakukan terhadap:

| No. | Skenario Pengujian                      | Hasil Aktual     | Status                  |
| --: | --------------------------------------- | ---------------- | ----------------------- |
|   1 | Akses `index.php/login`                 | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   2 | Login menggunakan akun admin yang valid | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   3 | Akses `index.php/admin` setelah login   | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   4 | Logout melalui halaman administrasi     | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   5 | Akses `index.php/admin` setelah logout  | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |

Catat hasil berdasarkan eksekusi yang benar-benar dilakukan. Jangan menuliskan pengujian berhasil apabila pengujian belum dilakukan.

### Penerapan Post-Redirect-Get (PRG)

Pada tahap ini dilakukan penelusuran dan pengujian pola
Post-Redirect-Get (PRG) pada proses autentikasi.

Penerapan PRG:

- Login berhasil menggunakan POST untuk proses autentikasi,
  kemudian redirect ke /admin dan dilanjutkan dengan GET.
- Logout menggunakan POST untuk mengakhiri session,
  kemudian redirect ke /auth/login dan dilanjutkan dengan GET.

Login gagal tidak menggunakan redirect karena Controller
mengembalikan View login beserta pesan kesalahan pada
request tersebut.

Pengujian aktual dilakukan terhadap:

| No. | Skenario Pengujian                  | Hasil Aktual     | Status                  |
| --: | ----------------------------------- | ---------------- | ----------------------- |
|   1 | Login dengan kredensial valid       | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   2 | Login dengan kredensial tidak valid | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   3 | Logout melalui halaman administrasi | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |
|   4 | Akses halaman admin setelah logout  | `[hasil aktual]` | `[Sesuai/Tidak Sesuai]` |

Catat hasil berdasarkan eksekusi yang benar-benar dilakukan. Jika ditemukan masalah, dokumentasikan perbaikan yang dilakukan dan ulangi pengujian yang terdampak.

### Perbaikan

| Masalah yang Ditemukan | Perbaikan yang Dilakukan | Hasil Setelah Perbaikan |
| ---------------------- | ------------------------ | ----------------------- |
| `[jika ada]`           | `[perbaikan aktual]`     | `[hasil aktual]`        |

Jika tidak ditemukan masalah, tuliskan:

> Tidak ditemukan masalah pada saat pengujian M.3.
