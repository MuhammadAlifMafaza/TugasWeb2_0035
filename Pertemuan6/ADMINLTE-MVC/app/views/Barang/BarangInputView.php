<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php if (isset($_GET['error']) && $_GET['error'] == 'duplicate'): ?>
        <div class="alert alert-danger" role="alert">
            Kode barang <strong><?= htmlspecialchars($_GET['kode_barang']); ?></strong> yang dimasukkan sudah ada. Silakan gunakan kode yang berbeda.
        </div>
    <?php endif; ?>
        <br><h1>Tambah Data Barang</h1><hr>
        <form method="post" action="?page=barang&action=simpan">
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="?page=barang" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
<?php
require_once 'app/views/layout/Footer.php'; // Footer
?>
