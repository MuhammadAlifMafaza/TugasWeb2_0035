<?php
// UserListView.php

$users = $controller->getAllUsers(); // Mendapatkan semua data pengguna
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Pengguna</h1>
        <a href="UserInputView.php" class="btn btn-primary mb-3">Tambah Pengguna</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['name']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td>
                            <a href="UserDetailView.php?id=<?= $user['id']; ?>" class="btn btn-info">Detail</a>
                            <a href="UserUpdateView.php?id=<?= $user['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="proses.php?action=delete&id=<?= $user['id']; ?>" class="btn btn-danger" 
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
