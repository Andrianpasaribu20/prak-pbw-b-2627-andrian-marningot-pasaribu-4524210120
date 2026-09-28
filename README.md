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

![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/c9b64dcb19b1ccb3314abe811b59ecd5599d67d4/Sesudah%20(2).png)
1. Menambahkan atribut Prodi

Pada kode awal hanya ada:

private string $nim;
private string $nama;
private float $ipk;

Kemudian ditambahkan:

private string $prodi;

Dan pada constructor:

$this->prodi = $prodi;

Sehingga saat membuat objek:

$mhs = new Mahasiswa(
    '2026001',
    'Andi Pratama',
    'Teknik Informatika',
    3.75
);

Sekarang data mahasiswa juga memiliki program studi.

2. Menambahkan fungsi predikat

Ditambahkan method:

public function predikat(): string
{
    if ($this->ipk >= 3.50) {
        return 'Sangat Memuaskan';
    } elseif ($this->ipk >= 3.00) {
        return 'Memuaskan';
    } else {
        return 'Perlu Peningkatan';
    }
}

Dengan IPK 3.75, hasilnya:

Predikat: Sangat Memuaskan

![image alt](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/5705a0f59829f85febf0b7618c27e7c08f8b92da/Sesudah%20(3).png)
Hasil sebelum modifikasi

Kode awal akan menghasilkan:

Keyboard Rp 250.000
Mouse Rp 135.000

Karena Mouse mendapatkan diskon 10%:

150.000 - 10% = 135.000
Hasil sesudah modifikasi

Dengan kode baru:

Keyboard - Rp 250.000 - Stok: 10 - Status: Tersedia
Mouse - Rp 135.000 - Stok: 0 - Status: Habis
2 Modifikasi yang dilakukan
1. Menambahkan stok produk

Pada kode awal constructor hanya memiliki:

public function __construct(
    protected string $nama,
    protected float $harga
) {}

Kemudian ditambahkan:

protected int $stok

Sehingga menjadi:

public function __construct(
    protected string $nama,
    protected float $harga,
    protected int $stok
) {}

Sekarang setiap produk memiliki informasi stok.

Contohnya:

new Produk('Keyboard', 250000, 10)

Artinya Keyboard memiliki stok 10.

2. Menambahkan status stok

Ditambahkan method:

public function statusStok(): string
{
    if ($this->stok > 0) {
        return 'Tersedia';
    } else {
        return 'Habis';
    }
}

Jika stok lebih dari 0:

Status: Tersedia

Jika stok 0:

Status: Habis
