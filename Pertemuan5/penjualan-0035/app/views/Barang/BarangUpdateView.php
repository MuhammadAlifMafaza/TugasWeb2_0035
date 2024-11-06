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
        <form method="post" action="?actionView=simpanUpdate">
            <input type="hidden" class="form-control" id="id" name="id" value="<?= htmlspecialchars($user['id']); ?>" required>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Simpan</button>
            <a href="?actionView=listView" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
