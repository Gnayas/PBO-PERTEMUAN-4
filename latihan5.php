<?php
declare(strict_types=1);

class LaporanMahasiswa {
    public function __construct(private string $nama) {}

    public function __call(string $method, array $arguments): mixed {
        // Hanya mengizinkan method 'cetakRingkas' tanpa argumen
        if ($method === 'cetakRingkas' && empty($arguments)) {
            return "Laporan Ringkas Mahasiswa: " . $this->nama;
        }
        throw new BadMethodCallException("Eksekusi gagal. Method '$method' tidak diizinkan atau argumen tidak sesuai.");
    }
}

$lap = new LaporanMahasiswa('Kania');

echo "<b>1. Pemanggilan Method Valid:</b><br>";
echo htmlspecialchars($lap->cetakRingkas()) . "<br><br>";

echo "<b>2. Pemanggilan Method Tidak Terdaftar (cetakDetail):</b><br>";
try {
    echo $lap->cetakDetail();
} catch (BadMethodCallException $e) {
    echo "Exception Ditangkap: " . htmlspecialchars($e->getMessage()) . "<br><br>";
}

echo "<b>3. Pemanggilan Method Valid dengan Argumen Tambahan:</b><br>";
try {
    echo $lap->cetakRingkas('pdf');
} catch (BadMethodCallException $e) {
    echo "Exception Ditangkap: " . htmlspecialchars($e->getMessage()) . "<br>";
}