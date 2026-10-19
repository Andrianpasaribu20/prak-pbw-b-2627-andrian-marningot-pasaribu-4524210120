<?php
require_once __DIR__ . '/../models/ProdukModel.php';

class ProdukController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProdukModel();
    }

    // Menampilkan daftar produk
    public function index()
    {
        $produk = $this->model->getAll();
        require __DIR__ . '/../views/index.php';
    }

    // Menampilkan form tambah produk
    public function create()
    {
        require __DIR__ . '/../views/create.php';
    }

    // Menyimpan produk baru ke database
    public function store()
    {
        $nama = trim($_POST['nama_produk'] ?? '');
        $harga = $_POST['harga'] ?? '';
        $stok = $_POST['stok'] ?? '';

        if (
            $nama === '' ||
            !is_numeric($harga) ||
            $harga < 0 ||
            filter_var($stok, FILTER_VALIDATE_INT) === false ||
            $stok < 0
        ) {
            die("Data produk tidak valid.");
        }

        $this->model->create($nama, $harga, $stok);

        header("Location: index.php");
        exit;
    }

    // Menampilkan form edit produk
    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $produk = $id ? $this->model->getById($id) : null;

        if (!$produk) {
            die("Produk tidak ditemukan.");
        }

        require __DIR__ . '/../views/edit.php';
    }

    // Memperbarui data produk
    public function update()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nama = trim($_POST['nama_produk'] ?? '');
        $harga = $_POST['harga'] ?? '';
        $stok = $_POST['stok'] ?? '';

        if (
            !$id ||
            $nama === '' ||
            !is_numeric($harga) ||
            $harga < 0 ||
            filter_var($stok, FILTER_VALIDATE_INT) === false ||
            $stok < 0
        ) {
            die("Data produk tidak valid.");
        }

        $this->model->update($id, $nama, $harga, $stok);

        header("Location: index.php");
        exit;
    }
}
?>