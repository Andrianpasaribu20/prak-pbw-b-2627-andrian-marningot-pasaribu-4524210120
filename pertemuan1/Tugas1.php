```php
<?php
// kalkulator.php
$hasil = null;
$pesan = '';
$nama = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Mengambil data dari form
    $nama = $_POST['nama'] ?? '';
    $a = $_POST['a'] ?? '';
    $b = $_POST['b'] ?? '';
    $operator = $_POST['operator'] ?? '';

    // Validasi nama dan angka
    if ($nama == '') {
        $pesan = 'Nama harus diisi.';
    } elseif ($a == '' || $b == '') {
        $pesan = 'Angka harus diisi.';
    } else {

        $a = (float) $a;
        $b = (float) $b;

        switch ($operator) {

            case '+':
                $hasil = $a + $b;
                break;

            case '-':
                $hasil = $a - $b;
                break;

            case '*':
                $hasil = $a * $b;
                break;

            case '/':
                if ($b == 0) {
                    $pesan = 'Tidak bisa membagi dengan nol.';
                } else {
                    $hasil = $a / $b;
                }
                break;

            default:
                $pesan = 'Operator tidak valid.';
        }
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kalkulator</title>

    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        .kotak {
            width: 350px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        input, select, button {
            padding: 8px;
            margin: 5px;
        }

        button {
            cursor: pointer;
        }

        .hasil {
            margin-top: 15px;
            color: green;
        }

        .error {
            margin-top: 15px;
            color: red;
        }
    </style>
</head>

<body>

    <div class="kotak">

        <h1>Kalkulator Sederhana</h1>

        <!-- MODIFIKASI 1: TAMBAH NAMA -->
        <form method="post">

            <label>Nama:</label><br>
            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($nama) ?>"
                required
            >
            <br>

            <label>Angka pertama:</label><br>
            <input
                type="number"
                step="any"
                name="a"
                required
            >
            <br>

            <select name="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>

            <br>

            <label>Angka kedua:</label><br>
            <input
                type="number"
                step="any"
                name="b"
                required
            >
            <br>

            <button type="submit">Hitung</button>

        </form>

        <?php if ($pesan): ?>

            <p class="error">
                <?= htmlspecialchars($pesan) ?>
            </p>

        <?php elseif ($hasil !== null): ?>

            <p class="hasil">
                Halo, <?= htmlspecialchars($nama) ?>!
                <br>
                Hasil: <?= htmlspecialchars((string)$hasil) ?>
            </p>

        <?php endif; ?>

    </div>

</body>

</html>
```
