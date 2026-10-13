Tugas 6
1. Bagian code create.php
![image](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/e9d9533a272eb040a01f1ff695678d572882c207/pertemuan6/Tugas6/Screenshot%202026-10-13%20215606.png)
   Modifikasi pertama — Validasi IPK
Jadi perubahan ini membatasi nilai IPK agar hanya bisa diisi dari 0 sampai 4,00. Jadi, pengguna tidak bisa memasukkan IPK di luar rentang tersebut melalui validasi bawaan browser.

  Modifikasi kedua — Mempercantik tampilan form
Perubahan kedua adalah menambahkan efek visual pada input, memperbaiki tampilan tombol Simpan, dan menambahkan tombol Kembali.
Ganti bagian kode <body> sampai </body> dengan kode berikut. Bagian <head> tetap menggunakan kode lama.

2. Bagian index.php
![image](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/d3f67418a5ce28816f2a39c75243c44d68d4fa00/pertemuan6/Tugas6/Screenshot%202026-10-13%20215834.png)

  Modifikasi Pertama — Fitur pencarian mahasiswa
Kode yang ditambahkan:
$keyword = $_GET['cari'] ?? '';
$keyword = mysqli_real_escape_string($koneksi, $keyword);
Penjelasannya : 
      _GET['cari'] mengambil kata kunci yang dimasukkan pada kolom pencarian.
      LIKE memungkinkan pencarian berdasarkan sebagian teks, bukan harus sama persis.
      OR memungkinkan pencarian melalui NIM, nama, atau program studi.
      Tombol Reset mengembalikan tampilan ke daftar seluruh mahasiswa.
      mysqli_real_escape_string() membantu mengamankan kata kunci untuk query SQL.

3. Bagian delete.php
![image](
