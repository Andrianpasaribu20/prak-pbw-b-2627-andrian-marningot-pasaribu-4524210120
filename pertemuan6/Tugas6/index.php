```php
<?php
include "koneksi.php";

$keyword = $_GET['cari'] ?? '';
$keyword = mysqli_real_escape_string($koneksi, $keyword);

$query = mysqli_query($koneksi, "
    SELECT * FROM mahasiswa
    WHERE nim LIKE '%$keyword%'
       OR nama LIKE '%$keyword%'
       OR prodi LIKE '%$keyword%'
    ORDER BY nama ASC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Mahasiswa</title>
</head>

<body class="bg-gray-100 min-h-screen p-6 font-sans text-gray-800">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-lg">

        <h2 class="text-2xl font-bold mb-2 text-blue-700">
            Data Mahasiswa
        </h2>

        <p class="text-gray-500 text-sm mb-5">
            Kelola data mahasiswa dengan mudah.
        </p>

        <!-- MODIFIKASI 1: Pencarian mahasiswa -->
        <div class="flex flex-col sm:flex-row gap-3 mb-5">

            <form action="index.php" method="GET"
                class="flex flex-1 gap-2">

                <input
                    type="text"
                    name="cari"
                    value="<?= htmlspecialchars($keyword); ?>"
                    placeholder="Cari NIM, nama, atau prodi..."
                    class="flex-1 min-w-0 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                    Cari
                </button>

                <?php if ($keyword !== '') { ?>
                    <a href="index.php"
                        class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg transition">
                        Reset
                    </a>
                <?php } ?>

            </form>

            <a href="create.php"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg text-center transition">
                + Tambah Mahasiswa
            </a>

        </div>

        <!-- Tabel data mahasiswa -->
        <div class="overflow-x-auto">

            <table class="w-full border-collapse text-left">

                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-3">NIM</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Prodi</th>
                        <th class="p-3">Angkatan</th>
                        <th class="p-3">IPK</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php if (mysqli_num_rows($query) > 0) { ?>

                    <?php while ($data = mysqli_fetch_assoc($query)) { ?>

                        <tr class="border-b hover:bg-blue-50 transition">

                            <td class="p-3">
                                <?= htmlspecialchars($data['nim']); ?>
                            </td>

                            <td class="p-3 font-medium">
                                <?= htmlspecialchars($data['nama']); ?>
                            </td>

                            <td class="p-3">
                                <?= htmlspecialchars($data['email']); ?>
                            </td>

                            <td class="p-3">
                                <?= htmlspecialchars($data['prodi']); ?>
                            </td>

                            <td class="p-3">
                                <?= htmlspecialchars($data['angkatan']); ?>
                            </td>

                            <!-- MODIFIKASI 2: Badge IPK -->
                            <td class="p-3">
                                <?php
                                $ipk = (float) $data['ipk'];

                                if ($ipk >= 3.50) {
                                    $warna = 'bg-green-100 text-green-700';
                                } elseif ($ipk >= 3.00) {
                                    $warna = 'bg-blue-100 text-blue-700';
                                } else {
                                    $warna = 'bg-yellow-100 text-yellow-700';
                                }
                                ?>

                                <span class="<?= $warna; ?> px-3 py-1 rounded-full text-sm font-semibold">
                                    <?= number_format($ipk, 2); ?>
                                </span>
                            </td>

                            <td class="p-3 text-center whitespace-nowrap">

                                <a href="edit.php?nim=<?= urlencode($data['nim']); ?>"
                                    class="inline-block bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded-md font-medium transition">
                                    Edit
                                </a>

                                <a href="delete.php?nim=<?= urlencode($data['nim']); ?>"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="inline-block bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded-md font-medium transition">
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                <?php } else { ?>

                    <tr>
                        <td colspan="7"
                            class="p-6 text-center text-gray-500">
                            Data mahasiswa tidak ditemukan.
                        </td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

        </div>

        <p class="text-sm text-gray-500 mt-4">
            Total data ditemukan:
            <strong><?= mysqli_num_rows($query); ?> mahasiswa</strong>
        </p>

    </div>

</body>
</html>
```