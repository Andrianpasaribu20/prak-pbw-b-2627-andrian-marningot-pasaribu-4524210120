```php
<?php
// biodata.php

function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim' => '2026001',
    'nama' => 'Andi Pratama',
    'prodi' => 'Teknik Informatika',
    'semester' => 1,
    'ipk' => 3.72,
    'status' => 'Aktif'
];

// Validasi IPK
if ($mahasiswa['ipk'] < 0 || $mahasiswa['ipk'] > 4) {
    $pesan = 'IPK tidak valid.';
} else {
    $pesan = '';
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata</title>

    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        .biodata {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        li {
            margin: 8px;
        }

        .predikat {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="biodata">

        <h1>Biodata Mahasiswa</h1>

        <?php if ($pesan): ?>

            <p class="error">
                <?= htmlspecialchars($pesan) ?>
            </p>

        <?php else: ?>

            <ul>

                <?php foreach ($mahasiswa as $kunci => $nilai): ?>

                    <li>
                        <?= ucfirst($kunci) ?>:
                        <?= htmlspecialchars((string)$nilai) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

            <p class="predikat">
                Predikat:
                <?= statusKelulusan($mahasiswa['ipk']) ?>
            </p>

        <?php endif; ?>

    </div>

</body>

</html>
```
