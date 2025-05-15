<?php
require_once __DIR__ . '/../../models/Produk.php';

use models\Produk;

if (!isset($_GET['id'])) {
    header('Location: list-produk.php');
    exit;
}

$id = $_GET['id'];
Produk::delete($id);

header('Location: list-produk.php');
exit;
