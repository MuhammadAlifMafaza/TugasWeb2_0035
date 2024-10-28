<?php
// proses.php

include_once 'database.php';

// Proses untuk menghapus data pengguna
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = new User();

    // Menghapus data dan melakukan redirect
    if ($user->hapusData($id)) {
        header("Location: index.php?message=Data berhasil dihapus");
        exit;
    } else {
        header("Location: index.php?message=Gagal menghapus data");
        exit;
    }
}

class proses {
    private $conn;

    // Menginisialisasi koneksi database
    public function __construct() {
        $this->conn = getDBConnection(); 
    }

    // Menambahkan data pengguna
    public function tambahData($name, $email) {
        $query = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Mengedit data pengguna
    public function editData($id, $name, $email) {
        $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Menghapus data pengguna
    public function hapusData($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Menampilkan semua data pengguna
    public function tampilData() {
        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mendapatkan data pengguna berdasarkan ID
    public function getDataById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
