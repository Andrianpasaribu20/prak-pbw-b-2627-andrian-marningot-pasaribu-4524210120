<?php
require_once __DIR__ . '/../koneksi.php';

class ProdukModel
{
    private $db;

    public function __construct()
    {
        global $koneksi;
        $this->db = $koneksi;
    }

    public function getAll()
    {
        return $this->db->query(
            "SELECT * FROM produk ORDER BY id DESC"
        );
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM produk WHERE id = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nama, $harga, $stok)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO produk (nama_produk, harga, stok)
             VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sdi", $nama, $harga, $stok);

        return $stmt->execute();
    }

    public function update($id, $nama, $harga, $stok)
    {
        $stmt = $this->db->prepare(
            "UPDATE produk
             SET nama_produk = ?, harga = ?, stok = ?
             WHERE id = ?"
        );
        $stmt->bind_param(
            "sdii",
            $nama,
            $harga,
            $stok,
            $id
        );

        return $stmt->execute();
    }
}
?>