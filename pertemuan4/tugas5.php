<?php

require_once 'koneksi.php';

// Memilih database
mysqli_select_db($koneksi, 'akademik');


// =============================================
// 1. UPDATE: Menambahkan IPK 0.10
// MODIFIKASI 1
// =============================================

echo "=== 1. PROSES UPDATE IPK ===\n";

$sqlUpdate = "UPDATE mahasiswa
              SET ipk = LEAST(ipk + 0.10, 4.00)
              WHERE nim = '2025003'
              AND ipk < 4.00";

if (mysqli_query($koneksi, $sqlUpdate)) {

    echo "IPK mahasiswa dengan NIM 2025003 berhasil diperbarui.\n";

} else {

    echo "Gagal UPDATE: "
        . mysqli_error($koneksi) . "\n";
}


// =============================================
// 2. SELECT: Menampilkan kategori IPK
// MODIFIKASI 2
// =============================================

echo "\n";
echo "=== 2. DATA MAHASISWA DAN KATEGORI IPK ===\n";

$sqlKategori = "SELECT
                    nim,
                    nama,
                    prodi,
                    ipk,
                    CASE
                        WHEN ipk >= 3.75 THEN 'Sangat Baik'
                        WHEN ipk >= 3.00 THEN 'Baik'
                        ELSE 'Cukup'
                    END AS kategori_ipk
                FROM mahasiswa
                ORDER BY ipk DESC";

$resultKategori = mysqli_query($koneksi, $sqlKategori);

if ($resultKategori && mysqli_num_rows($resultKategori) > 0) {

    while ($row = mysqli_fetch_assoc($resultKategori)) {

        echo "NIM          : " . $row['nim'] . "\n";
        echo "Nama         : " . $row['nama'] . "\n";
        echo "Prodi        : " . $row['prodi'] . "\n";
        echo "IPK          : " . $row['ipk'] . "\n";
        echo "Kategori IPK : " . $row['kategori_ipk'] . "\n";
        echo "----------------------------------------\n";
    }

} else {

    echo "Belum ada data mahasiswa.\n";
}


// =============================================
// 3. SELECT: Mencari mahasiswa dengan IPK tinggi
// =============================================

echo "\n";
echo "=== 3. MAHASISWA DENGAN IPK >= 3.50 ===\n";

$sqlFilter = "SELECT nim, nama, prodi, ipk
              FROM mahasiswa
              WHERE ipk >= 3.50
              ORDER BY ipk DESC";

$resultFilter = mysqli_query($koneksi, $sqlFilter);

if ($resultFilter && mysqli_num_rows($resultFilter) > 0) {

    while ($row = mysqli_fetch_assoc($resultFilter)) {

        echo "NIM   : " . $row['nim'] . "\n";
        echo "Nama  : " . $row['nama'] . "\n";
        echo "Prodi : " . $row['prodi'] . "\n";
        echo "IPK   : " . $row['ipk'] . "\n";
        echo "----------------------------------------\n";
    }

} else {

    echo "Tidak ada mahasiswa dengan IPK >= 3.50.\n";
}


// Menutup koneksi
mysqli_close($koneksi);

?>