<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
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
                        <h1>Daftar Barang</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <!-- Tombol Tambah Barang -->
                <a href="index.php?page=barang&action=addBarang" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> Tambah Barang
                </a>

                <!-- Tabel Daftar Barang -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($barang) && is_array($barang)): ?>
                                <?php $no = 1; ?>
                                <?php foreach ($barang as $item): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($item['kode_barang']); ?></td>
                                        <td><?= htmlspecialchars($item['nama_barang']); ?></td>
                                        <td><?= htmlspecialchars($item['harga']); ?></td>
                                        <td><?= htmlspecialchars($item['stok']); ?></td>
                                        <td>
                                            <a href="?page=barang&action=edit&kode_barang=<?= $item['kode_barang'] ?>" 
                                               class="btn btn-warning btn-sm">
                                               <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="?page=barang&action=delete&kode_barang=<?= $item['kode_barang']; ?>" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus data Barang <?= htmlspecialchars($item['nama_barang']); ?> ini?')">
                                               <i class="fas fa-trash-alt"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="6">Tidak ada data barang.</td></tr>
                            <?php endif; ?>
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
<!-- JS AdminLTE -->
<script src="public/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<script src="public/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="public/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
