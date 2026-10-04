Tugas Prak.PBW_B_Andrian Marningot Pasaribu_4524210120

![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/b451a0371a3579d7c1801cfe5891cb89dee01e1f/pertemuan3/Screenshot%202026-10-04%20202109.png)

2. Dua modifikasi yang dilakukan
Modifikasi 1: Styling
Saya ubah menjadi output HTML dengan CSS:
echo "<div class='success'>
        Database berhasil dibuat atau sudah ada.
      </div>";
jadi pas di jalanin di browser hasil jadi sedikit rapih

modifikasi 2 :Query
Saya menambahkan validasi pada database.
Contohnya:
CONSTRAINT chk_ipk
CHECK (ipk >= 0.00 AND ipk <= 4.00)

Artinya nilai IPK hanya boleh 0 sampai 4.

3. Penjelasan 5 bagian kode yang paling penting
1. require_once 'koneksi.php';
require_once 'koneksi.php';

Bagian ini digunakan untuk menghubungkan program PHP dengan database MySQL. File koneksi.php biasanya berisi konfigurasi seperti hostname, username, password, dan koneksi MySQL.
2. Membuat database
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

Perintah tersebut membuat database bernama akademik.
Penggunaan:
IF NOT EXISTS

berfungsi supaya database tidak dibuat ulang apabila database tersebut sudah tersedia.
3. Memilih database
mysqli_select_db($koneksi, "akademik");

Setelah database dibuat, bagian ini digunakan untuk menentukan bahwa seluruh query berikutnya akan dijalankan pada database akademik.
4. Foreign Key
Contohnya pada tabel mata_kuliah:
CONSTRAINT fk_mk_dosen
FOREIGN KEY (dosen_id)
REFERENCES dosen(id)
ON UPDATE CASCADE
ON DELETE SET NULL

Foreign key digunakan untuk menghubungkan tabel satu dengan tabel lainnya.
Dalam kasus ini:
dosen.id
    ↓
mata_kuliah.dosen_id

Jadi setiap mata kuliah dapat dikaitkan dengan dosen yang mengajarnya.
5. foreach untuk menjalankan query
foreach ($sqlCreateTables as $query) {

    if (mysqli_query($koneksi, $query)) {
        echo "Tabel berhasil dibuat atau sudah ada.";
    }
}

Bagian ini digunakan untuk menjalankan seluruh query pembuatan tabel yang disimpan di dalam array $sqlCreateTables.

hasil run
