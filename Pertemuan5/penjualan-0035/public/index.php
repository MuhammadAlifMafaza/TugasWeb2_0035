<?php
// Menggabungkan file header, home, dan footer
include 'home.php'; 

// Mengatur koneksi database
require_once 'app/config/database.php';
$dbConnection = getDBConnection();

// Main routing logic
require_once 'app/controllers/BarangController.php';
$controllerBarang = new BarangController($dbConnection);
$actionBarang = isset($_GET['actionBarang']) ? $_GET['actionBarang'] : 'listView';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($actionBarang) {
    case 'inputView':
        require 'app/views/Barang/BarangInputView.php';
        break;

    case 'updateView':
        if ($id) {
            $barang = $controllerBarang->show($id);
        }
        require 'app/views/Barang/BarangUpdateView.php';
        break;

    case 'listView':
    default:
        $barang = $controllerBarang->getAllBarang();
        break;

    case 'simpanData':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kodeBarang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $controllerBarang->addBarang($kodeBarang, $nama_barang, $harga, $stok);
        }
        header('Location: ?actionBarang=listView');
        exit;

    case 'hapusData':
        if ($id) {
            $controllerBarang->deleteBarang($id);
        }
        header('Location: ?actionBarang=listView');
        exit;
}
?>