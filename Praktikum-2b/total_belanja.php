<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    // Daftar harga produk
    $harga_produk = [
        "Televisi" => 4200000,
        "Kulkas" => 3100000,
        "Mesin Cuci" => 3800000
    ];

    // Mengecek apakah produk yang dipilih ada dalam daftar harga
    if (array_key_exists($produk, $harga_produk)) {
        $harga_satuan = $harga_produk[$produk];
        $total_harga = $harga_satuan * $jumlah;

        // Menampilkan hasil belanja
        echo "Nama Customer: <strong>$nama</strong><br>";
        echo "Produk Pilihan: <strong>$produk</strong><br>";
        echo "Harga Satuan: <strong>Rp " . number_format($harga_satuan, 0, ',', '.') . "</strong><br>";
        echo "Jumlah: <strong>$jumlah</strong><br>";
        echo "Total Harga: <strong>Rp " . number_format($total_harga, 0, ',', '.') . "</strong><br>";
    } else {
        echo "Produk tidak ditemukan!";
    }
} else {
    echo "Form belum disubmit!";
}
?>
