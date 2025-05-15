<?php
require_once __DIR__ . '/../config/db.php';

class Produk {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM produk");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tambahkan method lain jika perlu
}
