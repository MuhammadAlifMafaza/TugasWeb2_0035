<?php
// UserDetailView.php

include_once 'app/config/proses.php';
$proses = new proses();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $proses->getDataById($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Pengguna</title>
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
        .profile-img {
            width: 256px;
            height: 256px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #f9c74f;
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
        <h1>Detail Pengguna</h1>
        <div class="text-center">
            <img src="assets/Image/" alt="Profile Image" class="profile-img">
        </div>
        <p><strong>ID:</strong> <?= htmlspecialchars($data['id']); ?></p>
        <p><strong>Nama:</strong> <?= htmlspecialchars($data['name']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($data['email']); ?></p>
        <a href="?actionView=list" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
