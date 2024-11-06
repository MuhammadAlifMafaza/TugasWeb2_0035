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
        <a href="?actionBarang=inputView" class="btn btn-primary mb-3">Tambah Barang</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            <?php foreach ($barang as $item): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($item['nama_barang']); ?></td>
                    <td><?= htmlspecialchars($item['harga']); ?></td>
                    <td><?= htmlspecialchars($item['stok']); ?></td>
                    <td>
                        <a href="?actionBarang=detailView&id=<?= $item['id'] ?>" class="btn btn-info">Detail</a>
                        <a href="?actionBarang=updateView&id=<?= $item['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="?actionBarang=hapusData&id=<?= $item['id']; ?>" class="btn btn-danger"
                           onclick="return confirm('Apakah Anda yakin ingin menghapus data barang ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
