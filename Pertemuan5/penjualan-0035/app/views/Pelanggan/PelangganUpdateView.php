<!-- PelangganUpdateView.php -->
<?php include 'app/views/layout/Header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br><h1>Update Data Pelanggan</h1><hr>
        <form method="post" action="?page=pelanggan&action=update&id_pelanggan=<?= htmlspecialchars($Pelanggan['id_pelanggan']); ?>">
            <div class="mb-3">
                <label for="id_pelanggan" class="form-label">Id Pelanggan</label>
                <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= htmlspecialchars($Pelanggan['id_pelanggan']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= htmlspecialchars($Pelanggan['nama_pelanggan']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= htmlspecialchars($Pelanggan['alamat']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($Pelanggan['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon" value="<?= htmlspecialchars($Pelanggan['telepon']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="?page=pelanggan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
<?php include 'app/views/layout/Footer.php'; ?>
