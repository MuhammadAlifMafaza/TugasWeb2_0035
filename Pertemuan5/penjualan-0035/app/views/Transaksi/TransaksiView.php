<?php
// UserListView.php
$users = $controller->getAllUsers(); // Mendapatkan semua data pengguna
require_once 'app/config/proses.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Data Pengguna</title>
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
        .btn {
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Data Pengguna</h1>
        <!-- Button untuk form input pengguna baru -->
        <a href="?actionView=inputView" class="btn btn-primary mb-3">Tambah Pengguna</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; // no urut data ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $no++; ?></td> <!-- Menampilkan dan langsung inkrementasi -->
                    <!-- <td><?= htmlspecialchars($user['id']); ?></td> -->
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td>
                        <!-- Button untuk detail pengguna -->
                        <a href="?actionView=detailView&id=<?= $user['id'] ?>" class="btn btn-info">Detail</a>
                        <!-- Button untuk update pengguna -->
                        <a href="?actionView=updateView&id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                        <!-- Button untuk hapus data pengguna -->
                        <a href="?actionView=hapusData&id=<?= $user['id']; ?>" class="btn btn-danger" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data user <?= htmlspecialchars($user['name']); ?> ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        // Hide message after 5 seconds
        setTimeout(() => {
            const message = document.getElementById('message');
            if (message) {
                message.style.display = 'none';
            }
        }, 2000); 
    </script>
</body>
</html>
