<?php
// User.php

class Transaksi {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Mendapatkan data barang berdasarkan id_transaksi
    public function getBarangByKode($id_transaksi) {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE id_transaksi = :id_transaksi");
        $stmt->bindParam(':id_transaksi', $id_transaksi);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menampilkan semua data barang
    public function tampilBarang() {
        $stmt = $this->db->prepare("SELECT * FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menambah data barang
    public function tambahBarang($kodeBarang, $namaBarang, $harga, $stok) {
        $query = "INSERT INTO barang (id_transaksi, nama_barang, harga, stok) VALUES (:id_transaksi, :nama_barang, :harga, :stok)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_transaksi', $kodeBarang);
        $stmt->bindParam(':nama_barang', $namaBarang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    // Update data barang
    public function editBarang($id_transaksi, $namaBarang, $harga, $stok) {
        $query = "UPDATE barang SET nama_barang = :nama_barang, harga = :harga, stok = :stok WHERE id_transaksi = :id_transaksi";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_transaksi', $id_transaksi);
        $stmt->bindParam(':nama_barang', $namaBarang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    // Hapus data barang
    public function hapusBarang($id_transaksi) {
        $query = "DELETE FROM barang WHERE id_transaksi = :id_transaksi";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_transaksi', $id_transaksi);
        return $stmt->execute();
    }
}
?>
