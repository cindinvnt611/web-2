<?php
require_once __DIR__ . '/../../models/Produk.php';

use models\Produk;

if (!isset($_GET['id'])) {
    header('Location: list-produk.php');
    exit;
}

$id = $_GET['id'];
$produk = Produk::find($id);

if (!$produk) {
    echo "Produk tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    $data = [
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'harga' => $_POST['harga'],
        'stok' => $_POST['stok'],
    ];

    Produk::update($id, $data);
    header("Location: list-produk.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edit Produk</title>
    <link href="../../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <div class="container-fluid px-4 mt-4">
        <h1 class="mb-4">Edit Produk</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-box-open me-1"></i>
                Edit Data Produk
            </div>
            <div class="card-body">
                <form action="edit-produk.php?id=<?= htmlspecialchars($id) ?>" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" required
                            value="<?= htmlspecialchars($produk['nama']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= htmlspecialchars($produk['deskripsi']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" min="0" required
                            value="<?= htmlspecialchars($produk['harga']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" min="0" required
                            value="<?= htmlspecialchars($produk['stok']) ?>">
                    </div>

                    <a href="list-produk.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
