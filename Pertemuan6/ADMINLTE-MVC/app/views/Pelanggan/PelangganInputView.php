<!-- PelangganInputView.php -->
<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['error']) && $_GET['error'] == 'duplicate'): ?>
            <div class="alert alert-danger" role="alert">
                Id Pelanggan <strong><?= htmlspecialchars($_GET['id_pelanggan']); ?></strong> yang dimasukkan sudah ada. Silakan gunakan id yang berbeda.
            </div>
        <?php endif; ?>
        <br><h1>Tambah Data Pelanggan</h1><hr>
        <form method="post" action="?page=pelanggan&action=simpan">
            <div class="mb-3">
                <label for="id_pelanggan" class="form-label">Id Pelanggan</label>
                <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" required>
            </div>
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="?page=pelanggan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
<?php
require_once 'app/views/layout/Footer.php'; // Footer
?>
