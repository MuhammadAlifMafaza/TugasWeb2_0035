<?php
// BarangController.php
require_once 'app/models/Barang.php';

class TransaksiController {
    private $barangModel;

    public function __construct($dbConnection) {
        $this->barangModel = new Barang($dbConnection);
    }

    public function index() {
        // Cek apakah ada kode_barang di URL untuk detail barang
        $kodeBarang = isset($_GET['kode_barang']) ? $_GET['kode_barang'] : null;

        if ($kodeBarang) {
            // Jika kode barang ada, ambil data barang spesifik
            $barang = $this->barangModel->getBarangByKode($kodeBarang);
            include_once 'app/views/Barang/BarangDetailView.php'; // View untuk detail barang
        } else {
            // Jika tidak ada kode barang, tampilkan semua barang
            $barang = $this->barangModel->tampilBarang();
            include_once 'app/views/Barang/BarangListView.php'; // View untuk daftar barang
        }
    }

    public function addBarang() {
        // Tampilkan form untuk tambah barang
        include_once 'app/views/Barang/BarangInputView.php';
    }

    public function simpan() {
        // Menyimpan barang baru ke database
        $kodeBarang = $_POST['kode_barang'];
        $namaBarang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $this->barangModel->tambahBarang($kodeBarang, $namaBarang, $harga, $stok);
        header("Location: ?page=barang&action=index");
        exit();
    }

    public function edit() {
        // Tampilkan form edit barang
        $kodeBarang = isset($_GET['kode_barang']) ? $_GET['kode_barang'] : null;
        if ($kodeBarang) {
            $barang = $this->barangModel->getBarangByKode($kodeBarang);
            include_once 'app/views/Barang/BarangUpdateView.php';
        }
    }

    public function update() {
        // Mengupdate data barang di database
        $kodeBarang = $_POST['kode_barang'];
        $namaBarang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $this->barangModel->editBarang($kodeBarang, $namaBarang, $harga, $stok);
        header("Location: ?page=barang&action=index");
        exit();
    }

    public function delete() {
        // Menghapus data barang dari database
        $kodeBarang = isset($_GET['kode_barang']) ? $_GET['kode_barang'] : null;
        if ($kodeBarang) {
            $this->barangModel->hapusBarang($kodeBarang);
            header("Location: ?page=barang&action=index");
            exit();
        }
    }
}
