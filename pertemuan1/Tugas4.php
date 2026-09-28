```php
<?php

interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga,
        protected int $stok
    ) {}

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    // MODIFIKASI 1: Menambahkan stok
    public function getStok(): int
    {
        return $this->stok;
    }

    // MODIFIKASI 2: Menentukan status stok
    public function statusStok(): string
    {
        if ($this->stok > 0) {
            return 'Tersedia';
        } else {
            return 'Habis';
        }
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(
        string $nama,
        float $harga,
        int $stok,
        private float $diskon
    ) {
        parent::__construct($nama, $harga, $stok);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }
}

$daftar = [
    new Produk('Keyboard', 250000, 10),
    new ProdukDiskon('Mouse', 150000, 0, 10)
];

foreach ($daftar as $produk) {

    echo $produk->getNama() . " - Rp " .
        number_format(
            $produk->hargaAkhir(),
            0,
            ',',
            '.'
        );

    echo " - Stok: " . $produk->getStok();

    echo " - Status: " . $produk->statusStok();

    echo "<br>";
}
?>
```
