Tugas 7 

**Halaman Daftar Produk**
![image](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/339e884a8f5ddce07d83015419ff4d0ea6b73b50/pertemuan7/Tugas7/Screenshot%202026-10-19%20070618.png)
Pada halaman Daftar Produk, pengguna dapat melihat seluruh data produk yang tersimpan di database MySQL. Data ditampilkan dalam tabel yang berisi ID, nama produk, harga, dan stok. Pengguna juga dapat menambahkan produk baru melalui tombol Tambah Produk atau mengubah data melalui tombol Edit. Halaman ini menerapkan konsep MVC, yaitu Model untuk mengelola data, Controller untuk mengatur proses, dan View untuk menampilkan informasi kepada pengguna.
**Fitur pada halaman Daftar Produk:**
      Menampilkan ID, nama produk, harga, dan stok barang.
      Menyediakan tombol Tambah Produk untuk menambahkan data produk baru.
      Menyediakan tombol Edit untuk mengubah data produk yang sudah tersimpan.
      Menampilkan data secara otomatis berdasarkan isi database.


<b>Halaman From Tambah Produk<b>
![image](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/d71bd36641f90083d69f01f59afcb270f04865b9/pertemuan7/Tugas7/Screenshot%202026-10-19%20070707.png)
Pada halaman Form Tambah Produk, pengguna dapat memasukkan nama produk, harga, dan stok barang. Setelah tombol Simpan Produk ditekan, data akan dikirim ke Controller untuk diperiksa, kemudian Model menyimpan data tersebut ke database MySQL. Setelah berhasil, pengguna akan diarahkan kembali ke halaman Daftar Produk.
**Fitur pada Form Tambah Produk:**
      Nama Produk: Memasukkan nama barang yang akan dijual.
      Harga: Memasukkan harga produk.
      Stok: Memasukkan jumlah persediaan produk.
      Simpan Produk: Mengirimkan data untuk diproses dan disimpan ke database.
      Kembali ke Daftar Produk: Kembali ke halaman utama.


**Halaman Edit Produk **
![image](https://github.com/Andrianpasaribu20/prak-pbw-b-2627-andrian-marningot-pasaribu-4524210120/blob/18949bd3901892cea477f852a181f915d3f265de/pertemuan7/Tugas7/Screenshot%202026-10-19%20070721.png)
Pada halaman Form Edit Produk, pengguna dapat mengubah nama, harga, dan stok produk yang sudah tersimpan. Data produk ditampilkan terlebih dahulu berdasarkan ID produk yang dipilih. Setelah pengguna menekan tombol Simpan Perubahan, Controller memproses data tersebut dan Model memperbarui data di database MySQL. Dengan demikian, perubahan dapat ditampilkan kembali pada halaman Daftar Produk.
Fitur pada Form Edit Produk:
      Nama Produk: Mengubah nama produk.
      Harga: Memperbarui harga produk.
      Stok: Mengubah jumlah persediaan produk.
      Simpan Perubahan: Menyimpan data yang telah diperbarui ke database.
      Kembali ke Daftar Produk: Kembali ke halaman utama.


**Database**
Database dibuat menggunakan phpMyAdmin untuk menyimpan data produk pada program penjualan. Database yang digunakan bernama db_penjualan, sedangkan tabel yang digunakan bernama produk.




