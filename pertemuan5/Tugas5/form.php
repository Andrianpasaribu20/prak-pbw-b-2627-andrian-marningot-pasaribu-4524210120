
<form action="simpan.php" method="post">
    NIM:
    <input type="text" name="nim" required>
    <br><br>

    Nama:
    <input type="text" name="nama" required>
    <br><br>

    Email:
    <input type="email" name="email" required>
    <br><br>

    Prodi:
    <input type="text" name="prodi" required>
    <br><br>

    Angkatan:
    <input type="number" name="angkatan"
           min="2000" max="2099" required>
    <br><br>

    IPK:
    <input type="number" name="ipk"
           min="0" max="4" step="0.01" required>
    <br><br>

    Nomor Telepon:
    <input type="tel" name="telepon"
           pattern="[0-9]{10,13}"
           title="Masukkan 10 sampai 13 digit angka"
           required>
    <br><br>

    <button type="submit">Simpan</button>
</form>
