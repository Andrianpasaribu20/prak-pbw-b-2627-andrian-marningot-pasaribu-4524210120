<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
</head>
<body>
    <h2>Program Penjualan Produk</h2>

    <a href="index.php?action=create">+ Tambah Produk</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = $produk->fetch_assoc()): ?>
        <tr>
            <td><?= (int) $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nama_produk']) ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td><?= (int) $row['stok'] ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= (int) $row['id'] ?>">
                    Edit
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
