<?php
interface identtitas
{ 
    public function ringkasan(): string;
}

class Mahasiswa implements identtitas
{
    private string $nim;
    private string $nama;
    private float $ipk;

    public function __construct(string $nim, string $nama, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->ipk = $ipk;
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus antara 0 dan 4.');
        }
        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function ringkasan(): string

    { 
        return "{$this->nim}, Nama: {$this->nama}, IPK: {$this->ipk}";
    }
    
}

$mhs = new Mahasiswa('2026001', 'Andi Pratama', 3.75);
echo $mhs->ringkasan();
