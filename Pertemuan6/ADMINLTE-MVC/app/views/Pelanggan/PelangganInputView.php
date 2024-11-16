<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Pelanggan</title>
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
                        <h1>Tambah Data Pelanggan</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php if (isset($_GET['error']) && $_GET['error'] == 'duplicate'): ?>
                    <div class="alert alert-danger" role="alert">
                        Id Pelanggan <strong><?= htmlspecialchars($_GET['id_pelanggan']); ?></strong> yang dimasukkan sudah ada. Silakan gunakan id yang berbeda.
                    </div>
                <?php endif; ?>

                <form method="post" action="?page=pelanggan&action=simpan">
                    <div class="card">
                        <div class="card-body">
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
                        </div>
                    </div>
                </form>
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
