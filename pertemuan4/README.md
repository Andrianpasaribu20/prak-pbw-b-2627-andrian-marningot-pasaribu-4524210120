<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/aebaf20b-e831-499f-a9e9-9e68b3e93ed8" />Tugas 4 

![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/8fa316b250d85bfc1f71b5147fb69104ff9c8ba0/pertemuan4/Screenshot%202026-10-05%20194938.png)

![image alt](
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

Bagian ini digunakan untuk melakukan analisis data mahasiswa.
Contohnya bisa menghasilkan:
Prodi                Jumlah    Rata-rata IPK
------------------------------------------------
Sistem Informasi       1           3.82
Teknik Informatika     1           3.75

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

