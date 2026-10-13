```php
<?php
include "koneksi.php";

// MODIFIKASI 1: Validasi parameter NIM
if (!isset($_GET['nim']) || trim($_GET['nim']) === '') {
    echo "<script>
        alert('NIM tidak ditemukan');
        window.location.href = 'index.php';
    </script>";
    exit;
}

$nim = trim($_GET['nim']);

// MODIFIKASI 2: Menggunakan prepared statement
$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM mahasiswa WHERE nim = ?"
);

if (!$stmt) {
    echo "<script>
        alert('Gagal menyiapkan query penghapusan');
        window.location.href = 'index.php';
    </script>";
    exit;
}

mysqli_stmt_bind_param($stmt, "s", $nim);

$query = mysqli_stmt_execute($stmt);

if ($query && mysqli_stmt_affected_rows($stmt) > 0) {
    echo "<script>
        alert('Data mahasiswa berhasil dihapus');
        window.location.href = 'index.php';
    </script>";
} elseif ($query) {
    echo "<script>
        alert('Data mahasiswa tidak ditemukan');
        window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus');
        window.location.href = 'index.php';
    </script>";
}

mysqli_stmt_close($stmt);
?>
```