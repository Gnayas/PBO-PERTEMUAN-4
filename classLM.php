<?php
declare(strict_types=1);

class Buku {
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun
    ) {}

    public function tampilInfo(): string {
        return "Judul: <i>{$this->judul}</i> | Penulis: {$this->penulis} | Tahun Terbit: {$this->tahun}";
    }
}

$bukuA = new Buku('Pemrograman Web Lanjut', 'Eko Prasetyo', 2022);
$bukuB = new Buku('Struktur Data & Algoritma', 'Fina Lestari', 2020);
$bukuC = new Buku('Jaringan Komputer Modern', 'Gita Permana', 2023);

echo "Buku 1: " . $bukuA->tampilInfo() . "<br>";
echo "Buku 2: " . $bukuB->tampilInfo() . "<br>";
echo "Buku 3: " . $bukuC->tampilInfo() . "<br>";