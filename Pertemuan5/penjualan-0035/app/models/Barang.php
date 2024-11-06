<?php
// Barang.php

class Barang {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Mendapatkan data barang berdasarkan ID
    public function getBarangById($id) {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menampilkan semua data barang
    public function tampilBarang() {
        $stmt = $this->db->prepare("SELECT kode_barang, nama_barang, harga, stok FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menambah data barang
    public function tambahBarang($namaBarang, $harga, $stok) {
        $query = "INSERT INTO barang (nama_barang, harga, stok) VALUES (:nama_barang, :harga, :stok)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama_barang', $namaBarang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    // Update data barang
    public function editBarang($id, $namaBarang, $harga, $stok) {
        $query = "UPDATE barang SET nama_barang = :nama_barang, harga = :harga, stok = :stok WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama_barang', $namaBarang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    // Hapus data barang
    public function hapusBarang($id) {
        $query = "DELETE FROM barang WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
