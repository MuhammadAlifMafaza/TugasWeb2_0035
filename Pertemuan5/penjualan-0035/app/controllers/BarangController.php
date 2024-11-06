<?php
// BarangController.php
require_once 'app/models/Barang.php';

class BarangController {
    public $barangModel;

    public function __construct($dbConnection) {
        $this->barangModel = new Barang($dbConnection);
    }

    public function show($kodeBarang) {
        return $this->barangModel->getBarangBykode_barang($kodeBarang);
    }

    public function getAllBarang() {
        // Ambil semua barang
        $barangList = $this->barangModel->tampilBarang();
        
        // Include the view and pass the data
        include 'app/views/Barang/BarangListView.php';
    }

    public function addBarang($kodeBarang, $namaBarang, $harga, $stok) {
        // Tetap memanggil method untuk menambah barang
        $this->barangModel->tambahBarang($kodeBarang, $namaBarang, $harga, $stok);

        // Redirect ke halaman barang list view setelah tambah barang
        header("Location: ?actionBarang=getAllBarang");
        exit();
    }

    public function updateBarang($kode_barang, $namaBarang, $harga, $stok) {
        // Tetap memanggil method untuk mengupdate barang
        $this->barangModel->editBarang($kode_barang, $namaBarang, $harga, $stok);

        // Redirect ke halaman barang list view setelah update barang
        header("Location: ?actionBarang=getAllBarang");
        exit();
    }

    public function deleteBarang($kode_barang) {
        // Tetap memanggil method untuk menghapus barang
        $this->barangModel->hapusBarang($kode_barang);

        // Redirect ke halaman barang list view setelah hapus barang
        header("Location: ?actionBarang=getAllBarang");
        exit();
    }
}
