```php
<?php

interface identtitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements identtitas
{
    private string $nim;
    private string $nama;
    private string $prodi;
    private float $ipk;

    public function __construct(
        string $nim,
        string $nama,
        string $prodi,
        float $ipk
    ) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;

        // Validasi IPK
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException(
                'IPK harus antara 0 dan 4.'
            );
        }

        $this->ipk = $ipk;
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException(
                'IPK harus antara 0 dan 4.'
            );
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    // MODIFIKASI 2: Menentukan predikat IPK
    public function predikat(): string
    {
        if ($this->ipk >= 3.50) {
            return 'Sangat Memuaskan';
        } elseif ($this->ipk >= 3.00) {
            return 'Memuaskan';
        } else {
            return 'Perlu Peningkatan';
        }
    }

    public function ringkasan(): string
    {
        return "{$this->nim}, 
                Nama: {$this->nama}, 
                Prodi: {$this->prodi}, 
                IPK: {$this->ipk}, 
                Predikat: {$this->predikat()}";
    }
}

$mhs = new Mahasiswa(
    '2026001',
    'Andi Pratama',
    'Teknik Informatika',
    3.75
);

echo $mhs->ringkasan();

?>
```
