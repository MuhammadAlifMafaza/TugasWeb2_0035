<?php
// UserUpdateView.php

require_once 'app/controllers/UserController.php';
$controller = new UserController($dbConnection);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $controller->userModel->getDataById($id); // Mengambil data pengguna yang akan diedit
}

// Proses form jika metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $controller->updateUser($id, $name, $email); // Menggunakan method controller untuk mengupdate pengguna
    header("Location: index.php?message=Data berhasil diupdate");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Update Pengguna</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
