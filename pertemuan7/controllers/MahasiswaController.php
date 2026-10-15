<?php

require_once __DIR__ . "/../models/Mahasiswamodel.php";

class MahasiswaController {
    private $model;

    public function __construct($koneksi) {
        $this->model = new Mahasiswamodel($koneksi);
    }

    public function index() {
        $dataMahasiswa = $this->model->getAllMahasiswa();

        require __DIR__ . "/../views/mahasiswa/index.php";
    }
}
?>
