<?php
// User.php

class User {
    private $db;

    // Menginisialisasi koneksi database
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Mendapatkan data pengguna berdasarkan ID
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menampilkan semua data pengguna
    public function tampilData() {
        $stmt = $this->db->prepare("SELECT id, name, email FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
