Tugas 4
![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/8fa316b250d85bfc1f71b5147fb69104ff9c8ba0/pertemuan4/Screenshot%202026-10-05%20194938.png)

![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/693fa58f3eeaed13d29a1288659603b0ff1be94a/pertemuan4/Screenshot%202026-10-05%20200901.png)

modifikasi 2:
ON DUPLICATE KEY UPDATE
Kode awal menggunakan:
INSERT IGNORE

Saya ubah menjadi:
ON DUPLICATE KEY UPDATE
    nama = VALUES(nama),
    email = VALUES(email),
    prodi = VALUES(prodi),
    angkatan = VALUES(angkatan),
    ipk = VALUES(ipk)
Fungsinya adalah ketika data dengan NIM atau email yang sudah memiliki UNIQUE dimasukkan lagi, database tidak mengabaikannya, tetapi memperbarui data yang sudah ada.

modifikasi 2:

Menggunakan COUNT() dan AVG()
Query awal hanya menampilkan data mahasiswa satu per satu.
Saya ubah menjadi analisis berdasarkan program studi:
SELECT
    prodi,
    COUNT(*) AS jumlah_mahasiswa,
    ROUND(AVG(ipk), 2) AS rata_rata_ipk

COUNT(*) digunakan untuk menghitung jumlah mahasiswa.
AVG(ipk) digunakan untuk menghitung rata-rata IPK.
ROUND(..., 2) digunakan supaya rata-rata IPK ditampilkan dengan 2 angka di belakang koma.
Kemudian:
GROUP BY prodi
digunakan untuk mengelompokkan mahasiswa berdasarkan program studi.

5 Bagian Code yang Paling Penting
1. Memilih database
mysqli_select_db($koneksi, 'akademik');

Digunakan untuk menentukan database akademik yang akan digunakan oleh query berikutnya.
2. Query INSERT
$sqlInsert = "INSERT INTO mahasiswa (...) VALUES (...)";

Bagian ini digunakan untuk memasukkan data mahasiswa ke tabel mahasiswa.
Data yang dimasukkan meliputi:
- NIM
- Nama
- Email
- Prodi
- Angkatan
- IPK

3. ON DUPLICATE KEY UPDATE
ON DUPLICATE KEY UPDATE
    nama = VALUES(nama),
    email = VALUES(email),
    prodi = VALUES(prodi),
    angkatan = VALUES(angkatan),
    ipk = VALUES(ipk)

Bagian ini merupakan salah satu modifikasi utama.
Jika data dengan NIM/email yang sama sudah ada, maka data tersebut akan di-update, bukan menghasilkan error atau diabaikan.

4. GROUP BY, COUNT() dan AVG()
SELECT
    prodi,
    COUNT(*) AS jumlah_mahasiswa,
    ROUND(AVG(ipk), 2) AS rata_rata_ipk
FROM mahasiswa
WHERE ipk >= 3.50
GROUP BY prodi

Jadi tidak hanya mengambil data, tetapi juga melakukan perhitungan terhadap data.
5. Mencari IPK tertinggi
SELECT nim, nama, prodi, ipk
FROM mahasiswa
ORDER BY ipk DESC
LIMIT 1

Bagian ini digunakan untuk mendapatkan satu mahasiswa dengan IPK paling tinggi.
ORDER BY ipk DESC mengurutkan IPK dari terbesar ke terkecil.
Kemudian:
LIMIT 1

membatasi hasil menjadi satu data saja.


Tugas 5

![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/0c47f6f912568eb5316937c2a060fae6c3223b85/pertemuan4/Screenshot%202026-10-05%20195146.png)

![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/de643509967b2a659f8e370bb3338a11cb1b68ef/pertemuan4/Screenshot%202026-10-05%20195907.png)

2 modifikasi yang digunakan:
1. Modifikasi UPDATE → IPK tidak langsung diubah menjadi angka tetap, tetapi dinaikkan 0.10 poin dengan syarat IPK masih di bawah 4.00.
2. Modifikasi SELECT → menambahkan kategori IPK menggunakan CASE, sehingga mahasiswa dikelompokkan menjadi Sangat Baik, Baik, atau Cukup.

UPDATE menggunakan LEAST()
Bagian:
SET ipk = LEAST(ipk + 0.10, 4.00)

digunakan untuk menambahkan IPK sebesar 0.10.

Menambahkan kategori IPK dengan CASE
Bagian:
CASE
    WHEN ipk >= 3.75 THEN 'Sangat Baik'
    WHEN ipk >= 3.00 THEN 'Baik'
    ELSE 'Cukup'
END AS kategori_ipk

digunakan untuk memberikan kategori berdasarkan nilai IPK.

5 Bagian Code yang Paling Penting
1. mysqli_select_db()
mysqli_select_db($koneksi, 'akademik');

Digunakan untuk memilih database akademik yang akan digunakan.
2. Query UPDATE
$sqlUpdate = "UPDATE mahasiswa
              SET ipk = LEAST(ipk + 0.10, 4.00)
              WHERE nim = '2025003'
              AND ipk < 4.00";

Digunakan untuk mengubah data IPK mahasiswa tertentu.
Pada kode ini IPK dinaikkan 0.10 dan dibatasi maksimal 4.00.
3. CASE WHEN
CASE
    WHEN ipk >= 3.75 THEN 'Sangat Baik'
    WHEN ipk >= 3.00 THEN 'Baik'
    ELSE 'Cukup'
END AS kategori_ipk

Digunakan untuk membuat kategori berdasarkan kondisi tertentu.
Ini merupakan bagian penting karena database tidak hanya menampilkan angka IPK, tetapi juga memberikan klasifikasi terhadap IPK tersebut.
4. mysqli_fetch_assoc()
while ($row = mysqli_fetch_assoc($resultKategori)) {

Digunakan untuk mengambil hasil query baris demi baris dalam bentuk array associative.
Contohnya:
$row['nama']
$row['ipk']
$row['prodi']

digunakan untuk mengambil nilai dari kolom masing-masing.
5. mysqli_num_rows()
if ($resultKategori && mysqli_num_rows($resultKategori) > 0)

Digunakan untuk mengecek apakah query menghasilkan data.
