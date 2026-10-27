<?php
declare(strict_types=1);

class Mahasiswa {
    public function __construct(
        public string $nim,
        public string $nama,
        public int $semester = 1,
        public string $fakultas = "Belum diisi"
    ) {}

    public function getInfo(): string {
        return "NIM: $this->nim | Nama: $this->nama | Sem: $this->semester | Fakultas: $this->fakultas";
    }
}

// Objek 1: tanpa menyertakan argumen fakultas
$mhs1 = new Mahasiswa('2530101', 'Citra', 2);

// Objek 2: menyertakan argumen fakultas secara spesifik
$mhs2 = new Mahasiswa('2530102', 'Dharma', 4, 'Sains dan Teknologi');

echo "1. " . htmlspecialchars($mhs1->getInfo()) . "<br>";
echo "2. " . htmlspecialchars($mhs2->getInfo());