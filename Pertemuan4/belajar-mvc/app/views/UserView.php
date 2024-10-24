<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #a2dff7, #ffffff); /* Softer gradient for background */
            color: #22223b; /* Darker text color for better readability */
        }
        h1 {
            color: #ff7043; /* Softer color for headings */
        }
        .alert {
            background-color: #81d4fa; /* Light blue alert background */
            color: #22223b;
        }
        .table {
            background: rgba(255, 255, 255, 0.9); /* Light background for tables */
            border-radius: 8px;
        }
        .table th, .table td {
            vertical-align: middle; /* Align text vertically center */
            text-align: center; /* Center text in the table cells */
        }
        .table th:nth-child(1), .table td:nth-child(1) {
            width: 50px; /* Fixed width for ID column */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">User Detail</h1>
        <hr>
        <a href="input-data.php" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; // Initialize the counter ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td> <!-- Display the serial number -->
                        <td><?= htmlspecialchars($row['name']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td>
                            <a href="update-data.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="proses.php?action=delete&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data untuk <?= htmlspecialchars($row['nama']); ?>?')">Hapus</a>
                            <a href="detail-data.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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