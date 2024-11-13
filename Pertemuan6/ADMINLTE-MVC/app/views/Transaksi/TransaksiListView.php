<!-- TransaksiListView.php -->
<?php include 'app/views/layout/Header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br><h1>Daftar Transaksi</h1><hr>
        <a href="?page=transaksi&action=addTransaksi" class="btn btn-primary mb-3">Tambah Transaksi</a>
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
                        <a href="?page=transaksi&action=detail&id_transaksi=<?= $transaksi['id_transaksi']; ?>" class="btn btn-warning">Detail Transaksi</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php include 'app/views/layout/Footer.php'; ?>
