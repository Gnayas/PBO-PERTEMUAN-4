<?php
declare(strict_types=1);

class MahasiswaDinamis {
    private array $dataAksesoris = [];

    public function __construct(public string $nim, public string $nama) {}

    public function __set(string $property, mixed $value): void {
        $allowed = ['hobi'];
        if (!in_array($property, $allowed, true)) {
            throw new InvalidArgumentException("Atribut '$property' dilarang untuk diisi.");
        }
        echo "[__set] Menyimpan nilai untuk '$property'<br>";
        $this->dataAksesoris[$property] = $value;
    }

    public function __get(string $property): mixed {
        echo "[__get] Mengakses nilai dari '$property'<br>";
        if (!array_key_exists($property, $this->dataAksesoris)) {
            throw new OutOfBoundsException("Properti '$property' tidak terdaftar.");
        }
        return $this->dataAksesoris[$property];
    }

    public function __isset(string $property): bool {
        echo "[__isset] Memeriksa keberadaan '$property'<br>";
        return isset($this->dataAksesoris[$property]);
    }

    public function __unset(string $property): void {
        echo "[__unset] Menghapus properti '$property'<br>";
        unset($this->dataAksesoris[$property]);
    }
}

$mhs = new MahasiswaDinamis('253099', 'Joni');

echo "<b>1. Pengujian __set():</b><br>";
$mhs->hobi = 'Catur';

echo "<br><b>2. Pengujian __get():</b><br>";
echo "Hobi Mahasiswa: " . htmlspecialchars($mhs->hobi) . "<br>";

echo "<br><b>3. Pengujian __isset():</b><br>";
echo "Apakah 'hobi' ada? " . (isset($mhs->hobi) ? 'Ada' : 'Tidak Ada') . "<br>";

echo "<br><b>4. Pengujian __unset():</b><br>";
unset($mhs->hobi);
echo "Apakah 'hobi' ada setelah unset? " . (isset($mhs->hobi) ? 'Ada' : 'Tidak Ada') . "<br>";

echo "<br><b>5. Uji Exception __set() pada atribut dilarang:</b><br>";
try {
    $mhs->alamat = 'Sukabumi';
} catch (InvalidArgumentException $e) {
    echo "Tangkap Error: " . htmlspecialchars($e->getMessage()) . "<br>";
}

echo "<br><b>6. Uji Exception __get() setelah di-unset:</b><br>";
try {
    echo $mhs->hobi;
} catch (OutOfBoundsException $e) {
    echo "Tangkap Error: " . htmlspecialchars($e->getMessage()) . "<br>";
}