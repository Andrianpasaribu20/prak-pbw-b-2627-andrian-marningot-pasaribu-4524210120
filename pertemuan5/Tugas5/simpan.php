
<?php
include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$ipk = $_POST['ipk'];
$telepon = $_POST['telepon'];

// Modifikasi 1: Validasi IPK
if (!is_numeric($ipk) || $ipk < 0 || $ipk > 4) {
    die("IPK harus berada di antara 0 sampai 4");
}

// Modifikasi 2: Simpan nomor telepon
$stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, prodi, angkatan, ipk, telepon)
    VALUES (?, ?, ?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssssids",
    $nim,
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk,
    $telepon
);

if (mysqli_stmt_execute($stmt)) {
    echo "Data berhasil disimpan";
} else {
    echo "Data gagal disimpan";
}

mysqli_stmt_close($stmt);
?>
