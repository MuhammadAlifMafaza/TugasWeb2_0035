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
        $barangList = $this->barangModel->tampilBarang();
        // Kirim data barang ke view
        include 'app/views/Barang/BarangListView.php';
    }

    public function addBarang($kodeBarang, $namaBarang, $harga, $stok) {
        // Add barang
        $this->barangModel->tambahBarang($kodeBarang, $namaBarang, $harga, $stok);
        header("Location: ?actionBarang=getAllBarang");
        exit();
    }

    public function updateBarang($kode_barang, $namaBarang, $harga, $stok) {
        // Update barang
        $this->barangModel->editBarang($kode_barang, $namaBarang, $harga, $stok);
        header("Location: ?actionBarang=getAllBarang");
        exit();
    }

    public function deleteBarang($kode_barang) {
        // Delete barang
        $this->barangModel->hapusBarang($kode_barang);
        header("Location: ?actionBarang=getAllBarang");
        exit();
    }
}
