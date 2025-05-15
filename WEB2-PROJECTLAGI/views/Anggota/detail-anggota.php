<?php
require_once __DIR__ . '/../../models/Anggota.php';

use models\Anggota;

// Redirect jika tidak ada ID
if (!isset($_GET['id'])) {
    header("Location: list-anggota.php");
    exit;
}

$id = $_GET['id'];
$anggota = Anggota::findWithDetails($id);

// Redirect jika data tidak ditemukan
if (!$anggota) {
    header("Location: list-anggota.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Detail Anggota</title>
    <link href="../../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="../dashboard.php">Project 1</a>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="list-anggota.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Anggota
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Detail Anggota</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-anggota.php">Anggota</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-id-card me-1"></i>
                            Informasi Anggota
                        </div>
                        <div class="card-body">
                            <p><strong>ID Anggota:</strong> <?= $anggota['anggota_id'] ?></p>
                            <p><strong>Status Aktif:</strong> <?= $anggota['status_aktif'] ? 'Aktif' : 'Tidak Aktif' ?></p>
                            <hr>
                            <h5>Data Pegawai</h5>
                            <p><strong>Nama:</strong> <?= $anggota['nama_pegawai'] ?></p>
                            <p><strong>Jabatan:</strong> <?= $anggota['jabatan'] ?></p>
                            <hr>
                            <h5>Kartu Diskon</h5>
                            <p><strong>Nama Diskon:</strong> <?= $anggota['nama_diskon'] ?? 'Tidak Ada' ?></p>
                            <p><strong>Deskripsi:</strong> <?= $anggota['deskripsi_diskon'] ?? '-' ?></p>

                            <a href="list-anggota.php" class="btn btn-secondary mt-3">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
