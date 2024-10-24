<?php
include 'database.php';
$db = new Database();

$id = $_GET['id'];
$dataUser = $db->getDataById($id);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Detail User</h1>

    <?php if ($dataUser) { ?>
        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($dataUser['nama']); ?></p>
                <p><strong>Alamat:</strong> <?php echo htmlspecialchars($dataUser['alamat']); ?></p>
                <p><strong>No HP:</strong> <?php echo htmlspecialchars($dataUser['nohp']); ?></p>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger">Data tidak ditemukan!</div>
    <?php } ?>

    <div class="mt-3">
        <a href="edit.php?id=<?php echo htmlspecialchars($dataUser['id']); ?>" class="btn btn-warning">Edit</a>
        <a href="proses.php?aksi=hapus&id=<?php echo htmlspecialchars($dataUser['id']); ?>" 
           class="btn btn-danger" 
           onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
