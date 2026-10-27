<?php
declare(strict_types=1);

class Mahasiswa {
    public function __construct(
        public string $nim,
        public string $nama,
        public int $semester = 1
    ) {}

    public function profil(): string {
        return "$this->nim - $this->nama (Semester $this->semester)";
    }
}

$mhs1 = new Mahasiswa('231001', 'Alya', 3);
echo $mhs1->profil() . "<br>";

$mhs2 = new Mahasiswa('231002', 'Rian'); // Menguji nilai default semester = 1
echo $mhs2->profil();