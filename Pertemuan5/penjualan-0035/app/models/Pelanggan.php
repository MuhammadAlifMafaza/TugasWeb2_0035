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
        $stmt = $this->db->prepare("SELECT id_pelanggan, nama_pelanggan, alamat, email, telepon FROM Pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function idPelangganExists($IdPelanggan) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
        $stmt->bindParam(':id_pelanggan', $IdPelanggan);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Menambah data Pelanggan
    public function tambahPelanggan($idPelanggan, $namaPelanggan, $alamat, $email, $telepon) {
        // Cek apakah Id Pelanggan sudah ada
        if ($this->idPelangganExists($idPelanggan)) {
            throw new Exception("Kode barang '$idPelanggan' sudah ada. Silakan gunakan kode yang berbeda.");
        }
        $query = "INSERT INTO Pelanggan (id_pelanggan, nama_pelanggan, alamat, email, telepon) 
        VALUES (:id_pelanggan, :nama_pelanggan, :alamat, :email, :telepon)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pelanggan', $idPelanggan);
        $stmt->bindParam(':nama_pelanggan', $namaPelanggan);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telepon', $telepon);
        return $stmt->execute();
    }

    // Update data Pelanggan
    public function editPelanggan($id_pelanggan, $namaPelanggan, $alamat, $email, $telepon) {
        $query = "UPDATE Pelanggan SET nama_pelanggan = :nama_pelanggan, alamat = :alamat, email = :email, telepon = :telepon WHERE id_pelanggan = :id_pelanggan";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':nama_pelanggan', $namaPelanggan);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':email', $email);
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
