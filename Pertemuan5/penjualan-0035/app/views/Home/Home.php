<!-- app/views/home/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Selamat Datang di Aplikasi Penjualan</h1>
        <p>Ini adalah halaman utama yang menampilkan berbagai informasi tentang aplikasi Anda.</p>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Sistem Penjualan</a>
            <div class="navbar-nav">
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link" href="barang.php">Barang</a>
                <a class="nav-link" href="pelanggan.php">Pelanggan</a>
                <a class="nav-link" href="transaksi.php">Transaksi</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1><?php echo $data['message']; ?></h1>
    </div>
</body>
</html>
