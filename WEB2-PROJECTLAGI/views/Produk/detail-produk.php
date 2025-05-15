<?php
require_once __DIR__ . '/../../models/Produk.php';

use models\Produk;

if (!isset($_GET['id'])) {
    header('Location: list-produk.php');
    exit;
}

$produk = Produk::find($_GET['id']);

if (!$produk) {
    echo "Produk tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Detail Produk</title>
    <link href="../../public/css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <div class="container-fluid px-4 mt-4">
        <h1 class="mb-4">Detail Produk</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-box-open me-1"></i>
                Informasi Produk
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?= htmlspecialchars($produk['id']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= htmlspecialchars($produk['nama']) ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td><?= htmlspecialchars($produk['deskripsi']) ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td><?= htmlspecialchars($produk['stok']) ?></td>
                    </tr>
                </table>
                <a href="list-produk.php" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>
