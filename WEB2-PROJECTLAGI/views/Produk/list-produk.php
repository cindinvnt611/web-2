<?php
require_once __DIR__ . '/../../models/Produk.php';

use models\Produk;

$produks = Produk::getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>List Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <div class="container-fluid px-4 mt-4">
        <h1 class="mb-4">Daftar Produk</h1>
        <a href="create-produk.php" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Produk</a>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-box-open me-1"></i>
                Data Produk
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Harga (Rp)</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produks as $produk): ?>
                            <tr>
                                <td><?= htmlspecialchars($produk['id']) ?></td>
                                <td><?= htmlspecialchars($produk['nama']) ?></td>
                                <td><?= number_format($produk['harga'], 0, ',', '.') ?></td>
                                <td><?= htmlspecialchars($produk['stok']) ?></td>
                                <td>
                                    <a href="detail-produk.php?id=<?= $produk['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i> Detail</a>
                                    <a href="edit-produk.php?id=<?= $produk['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="delete-produk.php?id=<?= $produk['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?');"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($produks)): ?>
                            <tr>
                                <td colspan="5" class="text-center">Data produk kosong</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        const dataTable = new simpleDatatables.DataTable("#datatablesSimple");
    </script>
</body>

</html>
