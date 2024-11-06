<?php
// Menggabungkan file header, home, dan footer
include 'header.php'; 
include 'home.php'; 
include 'footer.php';

// Mengatur koneksi database
require_once 'app/config/database.php';
$dbConnection = getDBConnection();

// Inisialisasi controller
require_once 'app/controllers/BarangController.php';
$controllerBarang = new BarangController($dbConnection);

// Memeriksa parameter 'actionBarang'
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
        require 'app/views/Barang/BarangListView.php';
        break;

    case 'simpanData':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_barang = $_POST['nama_barang'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $controllerBarang->addBarang($kodeBarang,$nama_barang, $harga, $stok);
        }
        header('Location: ?actionBarang=listView');
        exit;

    case 'hapusData':
        if ($id) {
            $controllerBarang->deleteBarang($id);
        }
        header('Location: ?actionBarang=BarangListView');
        exit;
}
?>

switch ($actionPelanggan) {
    case 'inputView':
        require 'app/views/Barang/UserInputView.php';
        break;

    case 'updateView':
        if ($id) {
            $user = $controllerBarang->show($id); // Mendapatkan data pengguna
        }
        require 'app/views/Barang/UserUpdateView.php';
        break;

    case 'detailView':
        if ($id) {
            $user = $controllerBarang->show($id); // Mendapatkan data detail
        }
        require 'app/views/Barang/UserDetailView.php';
        break;

    case 'listView':
    default:
        $users = $controllerBarang->getAllUsers(); // Mendapatkan semua pengguna
        require 'app/views/Barang/UserListView.php';
        break;
        
    case 'simpanData':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controllerBarang->addUser($name, $email); // Simpan data pengguna baru
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'simpanUpdate':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controllerBarang->updateUser($id, $name, $email); // Update data pengguna
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'hapusData':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controllerBarang->deleteUser($id); // Memanggil fungsi hapus pengguna
        }
        header('Location: ?actionView=list'); // Redirect ke daftar pengguna
        exit;    
}

switch ($actionTransaksi) {
    case 'inputView':
        require 'app/views/Barang/UserInputView.php';
        break;

    case 'updateView':
        if ($id) {
            $user = $controllerBarang->show($id); // Mendapatkan data pengguna
        }
        require 'app/views/Barang/UserUpdateView.php';
        break;

    case 'detailView':
        if ($id) {
            $user = $controllerBarang->show($id); // Mendapatkan data detail
        }
        require 'app/views/Barang/UserDetailView.php';
        break;

    case 'listView':
    default:
        $users = $controllerBarang->getAllUsers(); // Mendapatkan semua pengguna
        require 'app/views/Barang/UserListView.php';
        break;
        
    case 'simpanData':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controllerBarang->addUser($name, $email); // Simpan data pengguna baru
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'simpanUpdate':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controllerBarang->updateUser($id, $name, $email); // Update data pengguna
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'hapusData':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controllerBarang->deleteUser($id); // Memanggil fungsi hapus pengguna
        }
        header('Location: ?actionView=list'); // Redirect ke daftar pengguna
        exit;    
}
?>
