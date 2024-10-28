<?php
// UserDetailView.php

include_once 'app/config/proses.php';
$proses = new Proses();  // Pastikan nama kelas sesuai dengan perubahan sebelumnya

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
        .profile-img {
            width: 256px;
            height: 256px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid black; /* Border lebih tipis dan hitam */
            margin: auto; /* Agar gambar terpusat dalam kolom */
        }
        h1 {
            color: #ff7043;
            text-align: center;
            margin-bottom: 30px;
        }
        .row {
            align-items: center; /* Agar gambar dan teks sejajar vertikal */
        }
        .data-section p {
            margin: 0;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Data Pengguna</h1>
        <div class="row">
            <!-- Gambar profil di bagian kiri -->
            <div class="col-md-4 text-center">
                <img src="../assets/images/logo.png" alt="Profile Image" class="profile-img">
            </div>
            
            <!-- Data pengguna di bagian kanan -->
            <div class="col-md-8 data-section">
                <p><strong>ID:</strong> <?= htmlspecialchars($data['id']); ?></p>
                <p><strong>Nama:</strong> <?= htmlspecialchars($data['name']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($data['email']); ?></p>
            </div>

            <!-- tombol Kembali -->
            <div class="text-end position-relative mt-3">
                <a href="?actionView=listView" class="btn btn-secondary mt-3">Kembali</a>
                <!-- Button untuk update pengguna -->
                <a href="?actionView=updateView&id=<?= $data['id'] ?>" class="btn btn-warning mt-3">Edit</a>
                <!-- Button untuk hapus data pengguna -->
                <a href="?actionView=hapusData&id=<?= $data['id']; ?>" class="btn btn-danger mt-3" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data user <?= htmlspecialchars($data['name']); ?> ini?')">Hapus</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
