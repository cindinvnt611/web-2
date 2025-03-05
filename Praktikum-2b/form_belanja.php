<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <!-- Form Belanja -->
        <div class="col-md-6">
            <h2>Belanja Online</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama">Customer</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Pilih Produk</label><br>
                    <div class="form-check form-check-inline">
                        <input name="produk" id="radio_tv" type="radio" class="form-check-input" value="TV" required>
                        <label for="radio_tv" class="form-check-label">TV</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="produk" id="radio_kulkas" type="radio" class="form-check-input" value="KULKAS" required>
                        <label for="radio_kulkas" class="form-check-label">Kulkas</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="produk" id="radio_mesin_cuci" type="radio" class="form-check-input" value="MESIN CUCI" required>
                        <label for="radio_mesin_cuci" class="form-check-label">Mesin Cuci</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required min="1">
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
            
            <!-- Hasil Form -->
            <div class="mt-4">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nama = htmlspecialchars($_POST['nama']);
                    $produk = htmlspecialchars($_POST['produk']);
                    $jumlah = (int) htmlspecialchars($_POST['jumlah']);
                    
                    $harga_produk = [
                        "TV" => 4200000,
                        "KULKAS" => 3100000,
                        "MESIN CUCI" => 3800000
                    ];
                    
                    $total_belanja = $harga_produk[$produk] * $jumlah;

                    echo "<h3>Data yang Dikirim:</h3>";
                    echo "<p>Nama Pembeli: $nama</p>";
                    echo "<p>Produk: $produk</p>";
                    echo "<p>Jumlah: $jumlah</p>";
                    echo "<p>Total Belanja: Rp " . number_format($total_belanja, 0, ',', '.') . "</p>";
                }
                ?>
            </div>
        </div>
        
        <!-- Daftar Harga -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Daftar Harga</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">TV: Rp 4.200.000</li>
                        <li class="list-group-item">Kulkas: Rp 3.100.000</li>
                        <li class="list-group-item">Mesin Cuci: Rp 3.800.000</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>