<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Transaksi</title>
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
                        <h1>Daftar Transaksi</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <a href="?page=transaksi&action=addTransaksi" class="btn btn-primary mb-3">Tambah Transaksi</a>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>ID Pelanggan</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($transaksiList as $transaksi): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($transaksi['kode_barang']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['id_pelanggan']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['jumlah']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['total_harga']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['tanggal']); ?></td>
                                    <td>
                                        <a href="?page=transaksi&action=detail&id_transaksi=<?= $transaksi['id_transaksi']; ?>" class="btn btn-warning">
                                            Detail Transaksi
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
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
