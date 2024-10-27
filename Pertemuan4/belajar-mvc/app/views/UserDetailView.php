<?php
// UserDetailView.php

include_once 'app/config/proses.php'; // Mengimpor proses penghapusan data
$user = new User();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $user->getDataById($id); // Mengambil data pengguna berdasarkan ID
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling untuk halaman detail pengguna */
        body {
            background: linear-gradient(135deg, #4CC9FE, #a2dff7);
            color: #f0f0f0;
            margin: 0;
        }
        .card {
            background: #F5F5F5;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 0;
        }
        .profile-img {
            width: 256px;  
            height: 256px; 
            border-radius: 50%;
            object-fit: cover; 
            border: 3px solid #f9c74f; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }
        .button-container {
            display: flex; 
            justify-content: flex-end; 
            margin-top: 20px; 
        }
        .button-container a {
            margin-left: 10px; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Data Pengguna</h1>
        <div class="card">
            <div class="row align-items-center">
                <div class="col-4">
                    <img src="<?= htmlspecialchars($data['foto']); ?>" alt="Foto" class="profile-img">
                </div>
                <div class="col-8">
                    <h3><?= htmlspecialchars($data['name']); ?></h3>
                    <p><strong>Nama:</strong> <?= htmlspecialchars($data['alamat']); ?></p>
                    <p><strong>No HP:</strong> <?= htmlspecialchars($data['nohp']); ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($data['email']); ?></p>
                </div>
            </div>
            <div class="button-container">
                <a href="UserUpdateView.php?id=<?= $data['id']; ?>" class="btn btn-warning">Edit</a>
                <a href="proses.php?action=delete&id=<?= $data['id']; ?>" class="btn btn-danger" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
