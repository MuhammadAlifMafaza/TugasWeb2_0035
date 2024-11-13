<?php
require_once 'app/models/Pelanggan.php';

class PelangganController {
    private $pelangganModel;

    public function __construct($dbConnection) {
        $this->pelangganModel = new Pelanggan($dbConnection);
    }

    public function index() {
        // Cek apakah ada id_pelanggan di URL untuk detail Pelanggan
        $IdPelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : null;

        if ($IdPelanggan) {
            // Jika Id Pelanggan ada, ambil data Pelanggan spesifik
            $Pelanggan = $this->pelangganModel->getPelangganById($IdPelanggan);
            include_once 'app/views/Pelanggan/PelangganDetailView.php'; // View untuk detail Pelanggan
        } else {
            // Jika tidak ada Id Pelanggan, tampilkan semua Pelanggan
            $Pelanggan = $this->pelangganModel->tampilPelanggan();
            include_once 'app/views/Pelanggan/PelangganListView.php'; // View untuk daftar Pelanggan
        }
    }

    public function addPelanggan() {
        // Tampilkan form untuk tambah Pelanggan
        include_once 'app/views/Pelanggan/PelangganInputView.php';
    }

    public function simpan() {
        // Menyimpan Pelanggan baru ke database
        $IdPelanggan = $_POST['id_pelanggan'];
        $namaPelanggan = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        try {
            // Panggil metode tambahPelanggan pada model
            $this->pelangganModel->tambahPelanggan($IdPelanggan, $namaPelanggan, $alamat, $email, $telepon);
            // Redirect ke halaman index Pelanggan setelah berhasil menambah data
            header("Location: ?page=pelanggan&action=index");
        } catch (Exception $e) {
            // Jika terjadi duplikasi, arahkan kembali ke input form dengan pesan error
            header("Location: ?page=pelanggan&action=addPelanggan&error=duplicate");
        }
        exit();
    }

    public function edit() {
        // Tampilkan form edit Pelanggan
        $IdPelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : null;
        if ($IdPelanggan) {
            $Pelanggan = $this->pelangganModel->getPelangganById($IdPelanggan);
            include_once 'app/views/Pelanggan/PelangganUpdateView.php';
        }
    }

    public function update() {
        // Mengupdate data Pelanggan di database
        $IdPelanggan = $_POST['id_pelanggan'];
        $namaPelanggan = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $this->pelangganModel->editPelanggan($IdPelanggan, $namaPelanggan, $alamat, $email, $telepon);
        header("Location: ?page=Pelanggan&action=index");
        exit();
    }

    public function delete() {
        // Menghapus data Pelanggan dari database
        $IdPelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : null;
        if ($IdPelanggan) {
            $this->pelangganModel->hapusPelanggan($IdPelanggan);
            header("Location: ?page=Pelanggan&action=index");
            exit();
        }
    }
}
