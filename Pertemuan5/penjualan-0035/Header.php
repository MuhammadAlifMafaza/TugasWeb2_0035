<!-- header.php -->
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
            <a class="navbar-brand" href="index.php">Sistem Penjualan</a>
            <div class="navbar-nav">
                <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" href="index.php?action=home">Home</a>
                <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'barang.php') ? 'active' : ''; ?>" href="barang.php">Barang</a>
                <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'pelanggan.php') ? 'active' : ''; ?>" href="pelanggan.php">Pelanggan</a>
                <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'transaksi.php') ? 'active' : ''; ?>" href="transaksi.php">Transaksi</a>
            </div>
        </div>
    </nav>
