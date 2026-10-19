```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>

    <form action="index.php?action=store" method="POST">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" required>
        <br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" min="0" step="any" required>
        <br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" min="0" step="1" required>
        <br><br>

        <button type="submit">Simpan Produk</button>
    </form>

    <br>
    <a href="index.php">Kembali ke Daftar Produk</a>
</body>
</html>
```