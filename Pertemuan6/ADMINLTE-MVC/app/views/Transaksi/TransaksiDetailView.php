<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="public/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="public/AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Transaksi</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                    <?php
                    // app/views/Transaksi/TransaksiDetailView.php

                    // Pastikan $transaksi ada dan memiliki data yang valid
                    if (isset($transaksi) && !empty($transaksi)) {
                    ?>
                        <p><strong>Id Transaksi:</strong> <?= htmlspecialchars($transaksi['id_transaksi']); ?></p>
                        <p><strong>Kode Barang:</strong> <?= htmlspecialchars($transaksi['kode_barang']); ?></p>
                        <p><strong>ID Pelanggan:</strong> <?= htmlspecialchars($transaksi['id_pelanggan']); ?></p>
                        <p><strong>Jumlah:</strong> <?= htmlspecialchars($transaksi['jumlah']); ?></p>
                        <p><strong>Total Harga:</strong> <?= htmlspecialchars($transaksi['total_harga']); ?></p>
                        <p><strong>Tanggal:</strong> <?= htmlspecialchars($transaksi['tanggal']); ?></p>
                    <?php
                    } else {
                        // Jika data transaksi tidak ditemukan
                        echo "<p>Data transaksi tidak ditemukan.</p>";
                    }
                    ?>
                    <a href="?page=transaksi&action=index" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
require_once 'app/views/layout/Footer.php'; // Footer
?>
<script src="public/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<script src="public/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="public/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
