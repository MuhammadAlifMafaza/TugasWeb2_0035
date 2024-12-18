<?php
// Barang.php

class Barang {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Mendapatkan data barang berdasarkan kode_barang
    public function getBarangByKode($kode_barang) {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE kode_barang = :kode_barang");
        $stmt->bindParam(':kode_barang', $kode_barang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menampilkan semua data barang
    public function tampilBarang() {
        $stmt = $this->db->prepare("SELECT kode_barang, nama_barang, harga, stok FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengidentifikasi kode barang apabila sudah ada
    public function kodeBarangExists($kodeBarang) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM barang WHERE kode_barang = :kode_barang");
        $stmt->bindParam(':kode_barang', $kodeBarang);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    

    public function tambahBarang($kodeBarang, $namaBarang, $harga, $stok) {
        // Cek apakah kode barang sudah ada
        if ($this->kodeBarangExists($kodeBarang)) {
            throw new Exception("Kode barang '$kodeBarang' sudah ada. Silakan gunakan kode yang berbeda.");
        }

        $query = "INSERT INTO barang (kode_barang, nama_barang, harga, stok) VALUES (:kode_barang, :nama_barang, :harga, :stok)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $kodeBarang);
        $stmt->bindParam(':nama_barang', $namaBarang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    // Update data barang
    public function editBarang($kode_barang, $namaBarang, $harga, $stok) {
        $query = "UPDATE barang SET nama_barang = :nama_barang, harga = :harga, stok = :stok WHERE kode_barang = :kode_barang";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $kode_barang);
        $stmt->bindParam(':nama_barang', $namaBarang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    // Hapus data barang
    public function hapusBarang($kode_barang) {
        $query = "DELETE FROM barang WHERE kode_barang = :kode_barang";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $kode_barang);
        return $stmt->execute();
    }
}
?>
