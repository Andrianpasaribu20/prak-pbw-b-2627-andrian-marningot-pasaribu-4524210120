Tugas1
![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/d1f0e219090e7453ffcdf8d89f9187cdf288c330/Sesudah.png)
Modifikasi 1 — Menambahkan nama pengguna
Pada kode awal belum ada input nama. Sekarang ditambahkan:
<input type="text" name="nama" required>

Kemudian nama ditampilkan pada hasil:
Halo, <?= htmlspecialchars($nama) ?>!

Contoh:
Halo, Budi!
Hasil: 15

Modifikasi 2 — Menambahkan validasi

Ditambahkan validasi:
if ($nama == '') {
    $pesan = 'Nama harus diisi.';
} elseif ($a == '' || $b == '') {
    $pesan = 'Angka harus diisi.';
}

Dan tetap ada validasi pembagian dengan nol:
if ($b == 0) {
    $pesan = 'Tidak bisa membagi dengan nol.';
}

Tugas 2
![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/47c9aa4cf8b808f8b0a502001ae4cb6cafca7920/Sesudah%20(1).png)
Modifikasi 1 — Menambahkan status mahasiswa

Pada kode awal data mahasiswa hanya:

$mahasiswa = [
    'nim' => '2026001',
    'nama' => 'Andi Pratama',
    'prodi' => 'Teknik Informatika',
    'semester' => 1,
    'ipk' => 3.72
];

Kemudian ditambahkan:
'status' => 'Aktif'
Karena data tersebut menggunakan foreach, status otomatis ikut ditampilkan.

Hasilnya menjadi:

Nim: 2026001
Nama: Andi Pratama
Prodi: Teknik Informatika
Semester: 1
Ipk: 3.72
Status: Aktif

Modifikasi 2 — Menambahkan validasi IPK

Ditambahkan:
if ($mahasiswa['ipk'] < 0 || $mahasiswa['ipk'] > 4) {
    $pesan = 'IPK tidak valid.';
}

IPK normalnya berada pada rentang 0 sampai 4. Jadi jika misalnya:
'ipk' => 5.2

program akan menampilkan:
IPK tidak valid.

