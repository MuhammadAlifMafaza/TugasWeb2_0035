<?php
// BarangController.php
require_once 'app/models/Barang.php';

class BarangController {
    public $barangModel;

    public function __construct($dbConnection) {
        $this->barangModel = new Barang($dbConnection);
    }

    public function show($kodeBarang) {
        // Mengembalikan data barang ke router utama
        return $this->barangModel->getBarangByKode($kodeBarang);
    }

    public function getAllBarang() {
        // Mengembalikan daftar barang ke router utama
        return $this->barangModel->tampilBarang();
    }

    public function addBarang($kodeBarang, $namaBarang, $harga, $stok) {
        // Menambahkan data barang
        $this->barangModel->tambahBarang($kodeBarang, $namaBarang, $harga, $stok);
        header("Location: ?actionBarang=getAllBarang");
        exit();
    }

    public function updateBarang($kode_barang, $namaBarang, $harga, $stok) {
        // Mengupdate data barang
        $this->barangModel->editBarang($kode_barang, $namaBarang, $harga, $stok);
        header("Location: ?actionBarang=getAllBarang");
        exit();
    }

    public function deleteBarang($kode_barang) {
        // Menghapus data barang
        $this->barangModel->hapusBarang($kode_barang);
        header("Location: ?actionBarang=getAllBarang");
        exit();
    }
}
