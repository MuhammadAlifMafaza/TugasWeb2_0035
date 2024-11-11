<!-- BarangListView.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Daftar Barang</h1>
        <a href="?actionBarang=inputBarang" class="btn btn-primary mb-3">Tambah Barang</a>
        <table class="table table-striped">
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
                            <a href="?actionBarang=updateBarang&kode_barang=<?= $item['kode_barang'] ?>" class="btn btn-warning">Edit</a>
                            <a href="?actionBarang=hapusData&kode_barang=<?= $item['kode_barang']; ?>" class="btn btn-danger"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data barang ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">Tidak ada data barang.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
