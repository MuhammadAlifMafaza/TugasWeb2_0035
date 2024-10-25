<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #a2dff7, #ffffff);
            color: #22223b;
        }
        h1 {
            color: #ff7043;
        }
        .alert {
            background-color: #81d4fa;
        }
        .table {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .table th:nth-child(1), .table td:nth-child(1) {
            width: 50px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Data Pengguna</h1>
        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-success" role="alert">
                <?= htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>
        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($controller->getAllUsers() as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['name']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td>
                            <a href="UpdateView.php?id=<?= $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="proses.php?action=delete&id=<?= $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <a href="UserDetailView.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="InputView.php?id=<?= $user['id']; ?>" class="btn btn-primary">Add User</a>
    </div>
</body>
</html>