<?php

class Pelanggan
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getPelangganByid_pelanggan($id_pelanggan)
    {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
        $stmt->bindParam(':id_pelanggan', $id_pelanggan, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mendapatkan semua Pelanggan
    public function getAllPelanggan()
    {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan ORDER BY id_pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isPelangganExists($id_pelanggan)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function addPelanggan($data)
    {
        // Cek apakah pelanggan sudah ada
        if ($this->isPelangganExists($data['id_pelanggan'])) {
            return false; // Jika sudah ada, return false
        }

        // Persiapkan statement untuk menyimpan data pelanggan
        $stmt = $this->db->prepare("INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, alamat) VALUES (:id_pelanggan, :nama_pelanggan, :alamat)");

        // Bind parameter
        $stmt->bindParam(':id_pelanggan', $data['id_pelanggan']);
        $stmt->bindParam(':nama_pelanggan', $data['nama_pelanggan']);
        $stmt->bindParam(':alamat', $data['alamat']);

        // Eksekusi statement
        $stmt->execute();

        return true; // Mengembalikan true jika berhasil
    }

    public function updatePelanggan($original_id_pelanggan, $data)
    {
        try {
            $stmt = $this->db->prepare("UPDATE pelanggan SET id_pelanggan = :new_id_pelanggan, nama_pelanggan = :nama_pelanggan, alamat = :alamat WHERE id_pelanggan = :original_id_pelanggan");
            $stmt->bindParam(':new_id_pelanggan', $data['id_pelanggan']);
            $stmt->bindParam(':nama_pelanggan', $data['nama_pelanggan']);
            $stmt->bindParam(':alamat', $data['alamat']);
            $stmt->bindParam(':original_id_pelanggan', $original_id_pelanggan);
            $result = $stmt->execute();
    
            return $result;
        } catch (PDOException $e) {
            error_log($e->getMessage()); // Logging error untuk debug
            return false;
        }
    }
    

    public function deletePelanggan($id_pelanggan)
    {
        $stmt = $this->db->prepare("DELETE FROM Pelanggan WHERE id_pelanggan = :id_pelanggan");
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        return $stmt->execute();
    }
}
