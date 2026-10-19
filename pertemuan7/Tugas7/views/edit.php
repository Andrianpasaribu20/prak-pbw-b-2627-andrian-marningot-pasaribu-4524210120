```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>

    <form action="index.php?action=update" method="POST">
        <input type="hidden" name="id"
               value="<?= (int) $produk['id'] ?>">

        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk"
               value="<?= htmlspecialchars($produk['nama_produk']) ?>"
               required>
        <br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" min="0" step="any"
               value="<?= htmlspecialchars($produk['harga']) ?>"
               required>
        <br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" min="0" step="1"
               value="<?= (int) $produk['stok'] ?>"
               required>
        <br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="index.php">Kembali ke Daftar Produk</a>
</body>
</html>
```