<?php
// User.php

class Transaksi {
    private $db;

    public function __construct($db) {
        $this->db = $db;  // Objek database disimpan
    }

    // Mendapatkan data pengguna berdasarkan ID
    public function getAllTransaksi($id) {
        $stmt = $this->db->prepare("SELECT * FROM transaksi WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menampilkan semua data pengguna
    public function tampilData() {
        $stmt = $this->db->prepare("SELECT id, name, email FROM transaksi");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method untuk menambah data pengguna
    public function tambahData($name, $email) {
        $query = "INSERT transaksi VALUES (:name, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Method untuk update data pengguna
    public function editData($id, $name, $email) {
        $query = "UPDATE transaksi SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // menghapus data pengguna
    public function hapusData($id) {
        $query = "DELETE FROM transaksi WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
}
?>
