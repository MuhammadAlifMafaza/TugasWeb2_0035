<?php
include_once 'proses.php';
$user = new User();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $user->getDataById($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4CC9FE, #a2dff7); /* Softer gradient with less contrast */
            color: #f0f0f0; /* Light text color */
            margin: 0; /* Remove default margin */
        }
        .card {
            background: #F5F5F5; /* Light card background */
            border-radius: 10px; /* Rounded corners */
            padding: 20px;
            margin-bottom: 0; /* Remove bottom margin */
        }
        .profile-img {
            width: 256px;  /* Profile image size */
            height: 256px; /* Profile image size */
            border-radius: 50%; /* Circular profile picture */
            object-fit: cover; /* Ensure image covers the area */
            border: 3px solid #f9c74f; /* Border color */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }
        .row.align-items-center {
            align-items: center; /* Align items vertically centered */
        }
        .button-container {
            display: flex; /* Use flexbox to position buttons */
            justify-content: flex-end; /* Align buttons to the right */
            margin-top: 20px; /* Space above buttons */
        }
        .button-container a {
            margin-left: 10px; /* Add spacing between buttons */
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
                    <h3><?= htmlspecialchars($data['nama']); ?></h3>
                    <p><strong>Alamat:</strong> <?= htmlspecialchars($data['alamat']); ?></p>
                    <p><strong>No HP:</strong> <?= htmlspecialchars($data['nohp']); ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($data['email']); ?></p>
                    <p><strong>Jenis Kelamin:</strong> <?= htmlspecialchars($data['jenis_kelamin']); ?></p>
                </div>
            </div>
            <div class="button-container">
                <a href="update-data.php?id=<?= $data['id']; ?>" class="btn btn-warning">Edit</a>
                <a href="proses.php?action=delete&id=<?= $data['id']; ?>" class="btn btn-danger" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
