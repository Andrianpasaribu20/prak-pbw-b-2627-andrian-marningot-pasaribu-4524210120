Tugas 5

![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/8e530b9afe04595484526adbfb28e9ec28081867/pertemuan5/Tugas5/Screenshot%202026-10-12%20220615.png)

di bagian code from saya menambahkan 2 modifikasi:
1. Menambahkan field Nomor Telepon.
2. Menambahkan validasi IPK agar nilainya hanya dari 0.00 sampai 4.00.

di bagian simpan 2 modifikasi
1. Menambahkan field Nomor Telepon agar data telepon ikut tersimpan ke database.
2. Menambahkan validasi IPK agar nilainya hanya dari 0 sampai 4.

    5 bagian code yang penting :
1. Form input data mahasiswa (form.php)
<form action="simpan.php" method="post">
    <input type="text" name="nim" required>
    <input type="text" name="nama" required>
    <input type="email" name="email" required>
</form>
Penjelasan: Bagian ini digunakan untuk menerima input data mahasiswa, seperti NIM, nama, dan email. Atribut action="simpan.php" menentukan file tujuan pemrosesan data, sedangkan method="post" digunakan untuk mengirimkan data melalui metode POST. Atribut required memastikan kolom wajib diisi.

2. Mengambil data dari form (simpan.php)
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$ipk = $_POST['ipk'];
$telepon = $_POST['telepon'];
Penjelasan: Bagian ini mengambil data yang dikirim dari form menggunakan $_POST, kemudian menyimpannya ke dalam variabel PHP agar dapat diproses dan dimasukkan ke database.

3. Validasi IPK (simpan.php)
if (!is_numeric($ipk) || $ipk < 0 || $ipk > 4) {
    die("IPK harus berada di antara 0 sampai 4");
}
Penjelasan: Bagian ini memeriksa apakah IPK berupa angka dan berada dalam rentang 0 sampai 4. Jika tidak memenuhi ketentuan, proses penyimpanan dihentikan dan pesan kesalahan ditampilkan.

4. Menyimpan data ke database (simpan.php)
$stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, prodi, angkatan, ipk, telepon)
    VALUES (?, ?, ?, ?, ?, ?, ?)"
);
Penjelasan: Bagian ini membuat perintah SQL untuk memasukkan data mahasiswa ke tabel mahasiswa. Penggunaan prepared statement dengan tanda ? membantu mencegah SQL injection ketika data dimasukkan ke database.

5. Menghubungkan ke database (koneksi.php)
$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "akademik"
);
Penjelasan: Bagian ini menghubungkan program PHP dengan database MySQL bernama akademik yang berjalan di komputer lokal. Variabel $koneksi digunakan oleh file lain untuk menjalankan query database.
