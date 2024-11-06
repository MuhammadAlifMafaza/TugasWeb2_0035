<?php
// Mengatur koneksi database
require_once 'app/config/database.php';
$dbConnection = getDBConnection();

// Inisialisasi controller
require_once 'app/controllers/UserController.php';
$controller = new UserController($dbConnection);

// Memeriksa parameter 'actionView'
$actionView = isset($_GET['actionView']) ? $_GET['actionView'] : 'list';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($actionBarang) {
    case 'inputView':
        require 'app/views/UserInputView.php';
        break;

    case 'updateView':
        if ($id) {
            $user = $controller->show($id); // Mendapatkan data pengguna
        }
        require 'app/views/UserUpdateView.php';
        break;

    case 'detailView':
        if ($id) {
            $user = $controller->show($id); // Mendapatkan data detail
        }
        require 'app/views/UserDetailView.php';
        break;

    case 'listView':
    default:
        $users = $controller->getAllUsers(); // Mendapatkan semua pengguna
        require 'app/views/UserListView.php';
        break;
        
    case 'simpanData':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controller->addUser($name, $email); // Simpan data pengguna baru
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'simpanUpdate':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controller->updateUser($id, $name, $email); // Update data pengguna
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'hapusData':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->deleteUser($id); // Memanggil fungsi hapus pengguna
        }
        header('Location: ?actionView=list'); // Redirect ke daftar pengguna
        exit;    
}
switch ($actionBarang) {
    case 'inputView':
        require 'app/views/UserInputView.php';
        break;

    case 'updateView':
        if ($id) {
            $user = $controller->show($id); // Mendapatkan data pengguna
        }
        require 'app/views/UserUpdateView.php';
        break;

    case 'detailView':
        if ($id) {
            $user = $controller->show($id); // Mendapatkan data detail
        }
        require 'app/views/UserDetailView.php';
        break;

    case 'listView':
    default:
        $users = $controller->getAllUsers(); // Mendapatkan semua pengguna
        require 'app/views/UserListView.php';
        break;
        
    case 'simpanData':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controller->addUser($name, $email); // Simpan data pengguna baru
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'simpanUpdate':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controller->updateUser($id, $name, $email); // Update data pengguna
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'hapusData':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->deleteUser($id); // Memanggil fungsi hapus pengguna
        }
        header('Location: ?actionView=list'); // Redirect ke daftar pengguna
        exit;    
}
switch ($actionBarang) {
    case 'inputView':
        require 'app/views/UserInputView.php';
        break;

    case 'updateView':
        if ($id) {
            $user = $controller->show($id); // Mendapatkan data pengguna
        }
        require 'app/views/UserUpdateView.php';
        break;

    case 'detailView':
        if ($id) {
            $user = $controller->show($id); // Mendapatkan data detail
        }
        require 'app/views/UserDetailView.php';
        break;

    case 'listView':
    default:
        $users = $controller->getAllUsers(); // Mendapatkan semua pengguna
        require 'app/views/UserListView.php';
        break;
        
    case 'simpanData':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controller->addUser($name, $email); // Simpan data pengguna baru
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'simpanUpdate':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $controller->updateUser($id, $name, $email); // Update data pengguna
    }
    header('Location: ?actionView=list'); // Redirect ke daftar pengguna
    exit;

    case 'hapusData':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->deleteUser($id); // Memanggil fungsi hapus pengguna
        }
        header('Location: ?actionView=list'); // Redirect ke daftar pengguna
        exit;    
}
?>
