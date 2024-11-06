<?php
// BarangController.php
require_once 'app/models/Barang.php';

class BarangController {
    public $barangModel;

    public function __construct($dbConnection) {
        $this->barangModel = new Barang($dbConnection);
    }

    public function show($id) {
        return $this->barangModel->getBarangById($id);
    }

    public function getAllBarang() {
        // Ambil semua barang tanpa mengembalikan data
        $barangList = $this->barangModel->tampilBarang();
        
        // Redirect ke halaman barang list view
        header("Location: app/views/Barang/BarangListView.php");
        exit();
    }

    public function addBarang($namaBarang, $harga, $stok) {
        // Tetap memanggil method untuk menambah barang
        $this->barangModel->tambahBarang($namaBarang, $harga, $stok);

        // Redirect ke halaman barang list view setelah tambah barang
        header("Location: app/views/Barang/BarangListView.php");
        exit();
    }

    public function updateBarang($id, $namaBarang, $harga, $stok) {
        // Tetap memanggil method untuk mengupdate barang
        $this->barangModel->editBarang($id, $namaBarang, $harga, $stok);

        // Redirect ke halaman barang list view setelah update barang
        header("Location: app/views/Barang/BarangListView.php");
        exit();
    }

    public function deleteBarang($id) {
        // Tetap memanggil method untuk menghapus barang
        $this->barangModel->hapusBarang($id);

        // Redirect ke halaman barang list view setelah hapus barang
        header("Location: app/views/Barang/BarangListView.php");
        exit();
    }
}
