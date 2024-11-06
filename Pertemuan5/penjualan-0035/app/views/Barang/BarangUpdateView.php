<?php
// BarangUpdateView.php

require_once 'app/controllers/UserController.php';
$controller = new UserController($dbConnection);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $controller->userModel->getDataById($id); // Mendapatkan data pengguna yang akan di-update
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $controller->userModel->editData($id, $name, $email);
    header("Location: index.php?view=list&message=Data berhasil diupdate");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4CC9FE, #a2dff7);
            color: #22223b;
        }
        .container {
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
        }
        h1 {
            color: #ff7043;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Data Pengguna</h1>
        <form method="post" action="?actionBarang=simpanUpdate">
            <input type="hidden" class="form-control" id="kode_barang" name="kode_barang" value="<?= htmlspecialchars($barang['kode_barang']); ?>" required>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($barang['nama_barang']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= htmlspecialchars($barang['harga']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?= htmlspecialchars($barang['stok']); ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Simpan</button>
            <a href="?actionBarang=listView" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
