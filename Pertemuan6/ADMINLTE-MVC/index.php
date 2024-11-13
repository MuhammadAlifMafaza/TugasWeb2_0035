<?php
// keterlibatan file yang diperlukan
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/BarangController.php';
require_once 'app/controllers/PelangganController.php';
require_once 'app/controllers/TransaksiController.php';
require_once 'app/models/Barang.php';
require_once 'app/models/Pelanggan.php';
require_once 'app/models/Transaksi.php';

// Mengatur koneksi database
require_once 'app/config/database.php';
$dbConnection = getDBConnection();

// Memeriksa parameter 'page' atau pengatur halaman
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($page) {
    case 'home':
        $controller = new HomeController($dbConnection);
        break;
    case 'barang':
        $controller = new BarangController($dbConnection);
        break;
    case 'pelanggan':
        $controller = new PelangganController($dbConnection);
        break;
    case 'transaksi':
        $controller = new TransaksiController($dbConnection);
        break;
    default:
        $controller = new HomeController($dbConnection);
}

// Memanggil metode pada controller
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    // Metode tidak ditemukan, tampilkan halaman kesalahan atau alihkan ke halaman utama
    echo "Error: Action '$action' not found.";
}
