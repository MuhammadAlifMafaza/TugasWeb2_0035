<?php
include 'database.php';
$db = new Database();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Object Oriented Programming PHP CRUD</h1>
    <div class="text-end mb-3">
        <a href="input.php" class="btn btn-primary">Tambah Data</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $nomer = 1;
            foreach ($db->tampilData() as $dataUsers) {
                ?>
                <tr>
                    <td><?php echo $nomer++; ?></td>
                    <td><?php echo htmlspecialchars($dataUsers['nama']); ?></td>
                    <td><?php echo htmlspecialchars($dataUsers['alamat']); ?></td>
                    <td><?php echo htmlspecialchars($dataUsers['nohp']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $dataUsers['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="proses.php?aksi=hapus&id=<?php echo $dataUsers['id']; ?>" 
                        class="btn btn-danger btn-sm" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini? \nNama: <?php echo htmlspecialchars($dataUsers['nama']); ?>')">Hapus</a>
                        <a href="detail.php?id=<?php echo $dataUsers['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
