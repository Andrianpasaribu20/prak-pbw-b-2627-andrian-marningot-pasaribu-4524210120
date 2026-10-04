<?php

require_once 'koneksi.php';

/* =========================
   MODIFIKASI 1: STYLING
   ========================= */
echo "
<!DOCTYPE html>
<html>
<head>
    <title>Database Akademik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 30px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class='container'>
<h2>📚 Sistem Database Akademik</h2>
";

/* =========================
   MEMBUAT DATABASE
   ========================= */

$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "<div class='success'>
            Database berhasil dibuat atau sudah ada.
          </div>";
} else {
    echo "<div class='error'>
            Error membuat database: " . mysqli_error($koneksi) . "
          </div>";
}

/* Mengatur charset */
mysqli_set_charset($koneksi, "utf8mb4");

/* Memilih database */
if (mysqli_select_db($koneksi, "akademik")) {
    echo "<div class='success'>
            Database akademik berhasil dipilih.
          </div>";
} else {
    echo "<div class='error'>
            Gagal memilih database: " . mysqli_error($koneksi) . "
          </div>";
}


/* =========================
   QUERY PEMBUATAN TABEL
   MODIFIKASI 2: CHECK & INDEX
   ========================= */

$sqlCreateTables = [

    // Tabel mahasiswa
    "CREATE TABLE IF NOT EXISTS mahasiswa (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(15) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE,
        prodi VARCHAR(80) NOT NULL,
        angkatan YEAR NOT NULL,
        ipk DECIMAL(3,2) DEFAULT 0.00,

        CONSTRAINT chk_ipk
        CHECK (ipk >= 0.00 AND ipk <= 4.00),

        INDEX idx_nama (nama)
    ) ENGINE=InnoDB",


    // Tabel dosen
    "CREATE TABLE IF NOT EXISTS dosen (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nidn VARCHAR(20) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE,

        INDEX idx_dosen_nama (nama)
    ) ENGINE=InnoDB",


    // Tabel mata kuliah
    "CREATE TABLE IF NOT EXISTS mata_kuliah (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        kode_mk VARCHAR(12) NOT NULL UNIQUE,
        nama_mk VARCHAR(100) NOT NULL,
        sks TINYINT UNSIGNED NOT NULL,
        dosen_id BIGINT UNSIGNED,

        CONSTRAINT chk_sks
        CHECK (sks > 0 AND sks <= 6),

        CONSTRAINT fk_mk_dosen
            FOREIGN KEY (dosen_id)
            REFERENCES dosen(id)
            ON UPDATE CASCADE
            ON DELETE SET NULL
    ) ENGINE=InnoDB",


    // Tabel KRS
    "CREATE TABLE IF NOT EXISTS krs (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        mahasiswa_id BIGINT UNSIGNED NOT NULL,
        semester TINYINT UNSIGNED NOT NULL,
        tahun_ajaran VARCHAR(9) NOT NULL,

        CONSTRAINT uq_krs UNIQUE (
            mahasiswa_id,
            semester,
            tahun_ajaran
        ),

        CONSTRAINT chk_semester
        CHECK (semester >= 1 AND semester <= 8),

        CONSTRAINT fk_krs_mahasiswa
            FOREIGN KEY (mahasiswa_id)
            REFERENCES mahasiswa(id)
            ON UPDATE CASCADE
            ON DELETE CASCADE
    ) ENGINE=InnoDB",


    // Tabel detail KRS
    "CREATE TABLE IF NOT EXISTS mk_krs (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        krs_id BIGINT UNSIGNED NOT NULL,
        mata_kuliah_id BIGINT UNSIGNED NOT NULL,

        CONSTRAINT fk_mkkrs_krs
            FOREIGN KEY (krs_id)
            REFERENCES krs(id)
            ON UPDATE CASCADE
            ON DELETE CASCADE,

        CONSTRAINT fk_mkkrs_mk
            FOREIGN KEY (mata_kuliah_id)
            REFERENCES mata_kuliah(id)
            ON UPDATE CASCADE
            ON DELETE CASCADE,

        CONSTRAINT uq_mk_krs
        UNIQUE (krs_id, mata_kuliah_id)
    ) ENGINE=InnoDB"
];


/* =========================
   MENJALANKAN QUERY
   ========================= */

foreach ($sqlCreateTables as $query) {

    if (mysqli_query($koneksi, $query)) {
        echo "<div class='success'>
                ✓ Tabel berhasil dibuat atau sudah ada.
              </div>";
    } else {
        echo "<div class='error'>
                ✗ Gagal membuat tabel: "
                . mysqli_error($koneksi) .
                "</div>";
    }
}


/* =========================
   MENGHAPUS DATABASE
   ========================= */

// Jika ingin menghapus database,
// hilangkan tanda komentar di bawah.

// mysqli_query(
//     $koneksi,
//     "DROP DATABASE IF EXISTS akademik"
// );


/* Menutup koneksi */
mysqli_close($koneksi);

echo "
</div>
</body>
</html>
";

?>