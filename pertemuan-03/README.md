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

Pengujian dilakukan terhadap:

1. login dengan kredensial valid;
2. login dengan kredensial tidak valid;
3. logout;
4. akses halaman admin setelah logout.

Sesuaikan dokumentasi hasil pengujian berdasarkan hasil
eksekusi aktual. Jangan menuliskan pengujian berhasil
apabila belum benar-benar dilakukan
