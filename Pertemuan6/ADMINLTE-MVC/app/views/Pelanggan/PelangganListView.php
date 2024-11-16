<!-- PelangganListView.php -->
<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br><h1>Daftar Pelanggan</h1><hr>
        <a href="index.php?page=pelanggan&action=addPelanggan" class="btn btn-primary mb-3">Tambah Data Pelanggan</a>
        <table class="table table-striped">
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
                            <a href="?page=pelanggan&action=edit&id_pelanggan=<?= $data['id_pelanggan'] ?>" class="btn btn-warning">Edit</a>
                            <a href="?page=pelanggan&action=delete&id_pelanggan=<?= $data['id_pelanggan']; ?>" class="btn btn-danger"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data Pelanggan <?= htmlspecialchars($data['nama_pelanggan']); ?> ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">Tidak ada data Pelanggan.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
require_once 'app/views/layout/Footer.php'; // Footer
?>