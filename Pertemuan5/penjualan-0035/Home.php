<!-- Header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <h4>Sistem Belanja</h4>
            <div class="navbar-nav">
                <!-- Home link, dynamically set active class -->
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
                </li>
                <!-- Barang link, dynamically set active class -->
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'barang.php') ? 'active' : ''; ?>" href="barang.php">Barang</a>
                </li>
                <!-- Pelanggan link, dynamically set active class -->
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'pelanggan.php') ? 'active' : ''; ?>" href="pelanggan.php">Pelanggan</a>
                </li>
                <!-- Transaksi link, dynamically set active class -->
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'transaksi.php') ? 'active' : ''; ?>" href="transaksi.php">Transaksi</a>
                </li>
            </div>
        </div>
    </nav>
    <div class="container mt-4">

<main>
    <h1>Selamat Datang di Aplikasi Penjualan</h1>
    <p>Ini adalah halaman utama yang menampilkan berbagai informasi tentang aplikasi Anda.</p>
</main>

<!-- Footer -->
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
