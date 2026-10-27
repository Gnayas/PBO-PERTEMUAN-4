<?php
declare(strict_types=1);

class Buku {
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun
    ) {
        echo "[INIT] Objek Buku '<b>{$this->judul}</b>' berhasil diinisialisasi.<br>";
    }

    public function detail(): string {
        return "'{$this->judul}' karya {$this->penulis} ({$this->tahun})";
    }

    public function __destruct() {
        echo "[DESTROY] Objek Buku '<b>{$this->judul}</b>' telah dihapus dari memori.<br>";
    }
}

echo "=== SKENARIO 1: Unset Tanpa Alias ===<br>";
$buku1 = new Buku('PHP 8 Mastery', 'Heri', 2021);
unset($buku1); // Destructor dipanggil langsung
echo "Log: Setelah instruksi unset(\$buku1).<br><br>";

echo "=== SKENARIO 2: Unset Dengan Alias ===<br>";
$buku2 = new Buku('OOP Advanced', 'Irfan', 2024);
$refBuku2 = $buku2; // Menyimpan referensi kedua (alias)

unset($buku2); // Hanya menghapus referensi pertama
echo "Log: Perintah unset(\$buku2) selesai dijalankan.<br>";
echo "Akses via alias: " . htmlspecialchars($refBuku2->detail()) . "<br>";

unset($refBuku2); // Menghapus referensi terakhir, destructor baru dipanggil
echo "Log: Perintah unset(\$refBuku2) selesai dijalankan.<br>";