<?php
// UserDetailView.php

include_once 'app/config/proses.php';
$proses = new Proses();  // Pastikan nama kelas dan file sesuai

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $proses->getDataById($id);  // Ambil data pengguna berdasarkan ID
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .row {
            align-items: center;
        }
        .data-section {
            padding-left: 30px; /* Tambahan padding kiri 30px */
        }
        .data-section p {
            margin: 0;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pengguna</h1>
        <div class="row">
            <div class="col-md-12 data-section">
                <p><strong>ID:</strong> <?= htmlspecialchars($data['id'] ?? 'Tidak tersedia'); ?></p>
                <p><strong>Nama:</strong> <?= htmlspecialchars($data['name'] ?? 'Tidak tersedia'); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($data['email'] ?? 'Tidak tersedia'); ?></p>
                <a href="?actionView=list" class="btn btn-secondary mt-3">Kembali</a>
                <a href="?actionView=updateView&id=<?= $user['id'] ?>" class="btn btn-warning mt-3">Edit</a>
                        <!-- Button untuk hapus data pengguna -->
                        <a href="?actionView=hapusData&id=<?= $user['id']; ?>" class="btn btn-danger mt-3" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data user <?= htmlspecialchars($user['name']); ?> ini?')">Hapus</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
