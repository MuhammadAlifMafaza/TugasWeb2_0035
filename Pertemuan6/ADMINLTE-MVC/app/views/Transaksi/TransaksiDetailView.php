<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br><h1>Detail Transaksi</h1><hr>
        <p><strong>Kode Barang:</strong> <?= htmlspecialchars($transaksi['kode_barang']); ?></p>
        <p><strong>ID Pelanggan:</strong> <?= htmlspecialchars($transaksi['id_pelanggan']); ?></p>
        <p><strong>Jumlah:</strong> <?= htmlspecialchars($transaksi['jumlah']); ?></p>
        <p><strong>Total Harga:</strong> <?= htmlspecialchars($transaksi['total_harga']); ?></p>
        <p><strong>Tanggal:</strong> <?= htmlspecialchars($transaksi['tanggal']); ?></p>
        
        <a href="?page=transaksi&action=index" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
<?php
require_once 'app/views/layout/Footer.php'; // Footer
?>