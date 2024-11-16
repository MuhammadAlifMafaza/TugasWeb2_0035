<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pelanggan</title>
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
                        <h1>Daftar Pelanggan</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <a href="index.php?page=pelanggan&action=addPelanggan" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> Tambah Data Pelanggan
                </a>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($Pelanggan) && is_array($Pelanggan)): ?>
                                <?php $no = 1; ?>
                                <?php foreach ($Pelanggan as $data): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($data['id_pelanggan']); ?></td>
                                        <td><?= htmlspecialchars($data['nama_pelanggan']); ?></td>
                                        <td><?= htmlspecialchars($data['alamat']); ?></td>
                                        <td><?= htmlspecialchars($data['email']); ?></td>
                                        <td><?= htmlspecialchars($data['telepon']); ?></td>
                                        <td>
                                            <a href="?page=pelanggan&action=edit&id_pelanggan=<?= $data['id_pelanggan'] ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="?page=pelanggan&action=delete&id_pelanggan=<?= $data['id_pelanggan']; ?>" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus data Pelanggan <?= htmlspecialchars($data['nama_pelanggan']); ?> ini?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="7">Tidak ada data Pelanggan.</td></tr>
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
<script src="public/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<script src="public/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="public/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
