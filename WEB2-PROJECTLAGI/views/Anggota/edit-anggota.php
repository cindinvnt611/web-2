<?php
require_once __DIR__ . '/../../models/Anggota.php';
require_once __DIR__ . '/../../models/Pegawai.php';
require_once __DIR__ . '/../../models/KartuDiskon.php';

use models\Anggota;
use models\Pegawai;
use models\KartuDiskon;

if (!isset($_GET['id'])) {
    header("Location: list-anggota.php");
    exit;
}

$id = $_GET['id'];
$anggota = Anggota::findWithDetails($id);
$pegawaiList = Pegawai::getAll();
$kartuDiskonList = KartuDiskon::getAll();

if (isset($_POST['submit'])) {
    $data = [
        'status_aktif' => isset($_POST['status_aktif']) ? 1 : 0,
        'pegawai_id' => $_POST['pegawai_id'],
        'kartu_diskon_id' => $_POST['kartu_diskon_id'] !== '' ? $_POST['kartu_diskon_id'] : null,
    ];

    Anggota::update($id, $data);
    header("Location: list-anggota.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="../dashboard.php">Project 1</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="list-anggota.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                        Anggota
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Najwa Aulia
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Anggota</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="list-anggota.php">Anggota</a></li>
                    <li class="breadcrumb-item active">Edit Anggota</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit me-1"></i>
                        Form Edit Anggota
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="pegawai_id" class="form-label">Pegawai</label>
                                <select class="form-select" id="pegawai_id" name="pegawai_id" required>
                                    <option value="">-- Pilih Pegawai --</option>
                                    <?php foreach ($pegawaiList as $pegawai): ?>
                                        <option value="<?= $pegawai['id'] ?>" <?= $anggota['pegawai_id'] == $pegawai['id'] ? 'selected' : '' ?>>
                                            <?= $pegawai['nama'] ?> - <?= $pegawai['nip'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kartu_diskon_id" class="form-label">Kartu Diskon</label>
                                <select class="form-select" id="kartu_diskon_id" name="kartu_diskon_id">
                                    <option value="">-- Tidak Ada --</option>
                                    <?php foreach ($kartuDiskonList as $diskon): ?>
                                        <option value="<?= $diskon['id'] ?>" <?= $anggota['kartu_diskon_id'] == $diskon['id'] ? 'selected' : '' ?>>
                                            <?= $diskon['nama'] ?> (<?= $diskon['persen_diskon'] ?>%)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="status_aktif" name="status_aktif" value="1"
                                    <?= $anggota['status_aktif'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="status_aktif">Status Aktif</label>
                            </div>

                            <a href="list-anggota.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">&copy; Project 1 <?= date('Y') ?></div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../../public/js/scripts.js"></script>
</body>
</html>
