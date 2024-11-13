<?php
// User.php

class Pelanggan {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Mendapatkan data Pelanggan berdasarkan id_pelanggan
    public function getPelangganById($id_pelanggan) {
        $stmt = $this->db->prepare("SELECT * FROM Pelanggan WHERE id_pelanggan = :id_pelanggan");
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menampilkan semua data Pelanggan
    public function tampilPelanggan() {
        $stmt = $this->db->prepare("SELECT id_pelanggan, nama_Pelanggan, alamat, telepon FROM Pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menambah data Pelanggan
    public function tambahPelanggan($kodePelanggan, $namaPelanggan, $alamat, $telepon) {
        $query = "INSERT INTO Pelanggan (id_pelanggan, nama_Pelanggan, alamat, telepon) VALUES (:id_pelanggan, :nama_Pelanggan, :alamat, :telepon)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pelanggan', $kodePelanggan);
        $stmt->bindParam(':nama_Pelanggan', $namaPelanggan);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':telepon', $telepon);
        return $stmt->execute();
    }

    // Update data Pelanggan
    public function editPelanggan($id_pelanggan, $namaPelanggan, $alamat, $telepon) {
        $query = "UPDATE Pelanggan SET nama_Pelanggan = :nama_Pelanggan, alamat = :alamat, telepon = :telepon WHERE id_pelanggan = :id_pelanggan";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':nama_Pelanggan', $namaPelanggan);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':telepon', $telepon);
        return $stmt->execute();
    }

    // Hapus data Pelanggan
    public function hapusPelanggan($id_pelanggan) {
        $query = "DELETE FROM Pelanggan WHERE id_pelanggan = :id_pelanggan";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        return $stmt->execute();
    }
}
?>
