<?php
function base_url($path = '')
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $base_url = $protocol . $host . '/penjualan-0030-tugas6';
    return $base_url . $path;
}
require_once 'config/database.php';
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/BarangController.php';
require_once 'app/controllers/PelangganController.php';
require_once 'app/controllers/TransaksiController.php';

// Menghubungkan ke database
$dbConnection = getDBConnection();
$HomeController = new HomeController($dbConnection);
$BarangController = new BarangController($dbConnection);
$PelangganController = new PelangganController($dbConnection);
$TransaksiController = new TransaksiController($dbConnection);

// Mendapatkan aksi yang diinginkan
$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$kode_barang = isset($_GET['kode_barang']) ? intval($_GET['kode_barang']) : null;

switch ($action) {
        // Routing Halaman Home
    case 'home':
        $HomeController->index();
        break;
        // Routing Bagian Barang
    case 'barang':
        $BarangController->index();
        break;
    case 'addBarang':
        $BarangController->addBarang();
        break;
    case 'storeBarang':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'kode_barang' => $_POST['kode_barang'],
                'nama_barang' => $_POST['nama_barang'],
                'harga' => intval($_POST['harga']),
                'stok' => intval($_POST['stok'])
            ];
            $BarangController->storeBarang($data);
        }
        break;
    case 'editBarang':
        $kode_barang = isset($_GET['kode_barang']) ? $_GET['kode_barang'] : null;
        if ($kode_barang) {
            $BarangController->editBarang($kode_barang);
        } else {
            // Tambahkan pesan error atau redirect jika kode_barang kosong
            echo "Kode barang tidak ditemukan.";
        }
        break;
    case 'updateBarang':
        $kode_barang = isset($_GET['kode_barang']) ? $_GET['kode_barang'] : null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $kode_barang) {
            $data = [
                'kode_barang' => $_POST['kode_barang'],
                'nama_barang' => $_POST['nama_barang'],
                'harga' => intval($_POST['harga']),
                'stok' => intval($_POST['stok'])
            ];

            $BarangController->updateBarang($kode_barang, $data);
        }
        break;
    case 'deleteBarang':
        $kode_barang = isset($_GET['kode_barang']) ? $_GET['kode_barang'] : null;
        if ($kode_barang) {
            $BarangController->deleteBarang($kode_barang);
        }
        break;
        // End Routing Barang

        // Routing Pelanggan
    case 'pelanggan':
        $PelangganController->index();
        break;
    case 'addPelanggan':
        $PelangganController->addPelanggan();
        break;
    case 'storePelanggan':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_pelanggan' => $_POST['id_pelanggan'],
                'nama_pelanggan' => $_POST['nama_pelanggan'],
                'alamat' => $_POST['alamat'],
            ];
            $PelangganController->storePelanggan($data);
        }
        break;
    case 'editPelanggan':
        $id_pelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : null;
        if ($id_pelanggan) {
            $PelangganController->editPelanggan($id_pelanggan);
        } else {
            echo "Kode Pelanggan tidak ditemukan.";
        }
        break;
    case 'updatePelanggan':
        $id_pelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id_pelanggan) {
            $data = [
                'id_pelanggan' => $_POST['id_pelanggan'],
                'nama_pelanggan' => $_POST['nama_pelanggan'],
                'alamat' => $_POST['alamat'],
            ];

            $PelangganController->updatePelanggan($id_pelanggan, $data);
        }
        break;
    case 'deletePelanggan':
        $id_pelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : null;
        if ($id_pelanggan) {
            $PelangganController->deletePelanggan($id_pelanggan);
        }
        break;
        // End Routing Pelanggan

        // Routing Transaksi
    case 'transaksi':
        $TransaksiController->index();
        break;
    case 'detailTransaksi':
        $id_transaksi = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : null;
        $TransaksiController->detailTransaksi($id_transaksi);
        break;
    case 'addTransaksi':
        $TransaksiController->addTransaksi();
        break;
    case 'storeTransaksi':
        $id_transaksi = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $TransaksiController->storeTransaksi();
        }
        break;        
    default:
        $HomeController->index();
        break;
}