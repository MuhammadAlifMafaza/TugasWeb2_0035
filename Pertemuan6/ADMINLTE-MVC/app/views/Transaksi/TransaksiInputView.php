<?php
require_once 'app/views/layout/Header.php'; // Header dan Navbar
require_once 'app/views/layout/Sidebar.php'; // Sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Transaksi</title>
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
                        <h1>Tambah Data Transaksi</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
            <?php
            // app/views/Transaksi/TransaksiInputView.php
            $idTransaksi = $this->transaksiModel->getNextTransaksiId(); // Mendapatkan ID otomatis
            ?>
            <form method="post" action="?page=transaksi&action=simpan">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="id_transaksi" class="form-label">ID Transaksi</label>
                            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?= htmlspecialchars($idTransaksi); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="?page=transaksi&action=index" class="btn btn-secondary">Kembali</a>
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
