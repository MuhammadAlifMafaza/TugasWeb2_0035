<?php

class Barang
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getBarangBykode_barang($kode_barang)
    {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE kode_barang = :kode_barang");
        $stmt->bindParam(':kode_barang', $kode_barang, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mendapatkan semua barang
    public function getAllBarang()
    {
        $stmt = $this->db->prepare("SELECT * FROM barang ORDER BY kode_barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isBarangExists($kode_barang)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM barang WHERE kode_barang = :kode_barang");
        $stmt->bindParam(':kode_barang', $kode_barang);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function addBarang($data)
    {
        if ($this->isBarangExists($data['kode_barang'])) {
            return false;
        }
        $stmt = $this->db->prepare("INSERT INTO barang (kode_barang, nama_barang, harga, stok) VALUES (:kode_barang, :nama_barang, :harga, :stok)");
        $stmt->bindParam(':kode_barang', $data['kode_barang']);
        $stmt->bindParam(':nama_barang', $data['nama_barang']);
        $stmt->bindParam(':harga', $data['harga'], PDO::PARAM_INT);
        $stmt->bindParam(':stok', $data['stok'], PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public function updateBarang($original_kode_barang, $data)
    {
        $stmt = $this->db->prepare("UPDATE barang SET kode_barang = :new_kode_barang, nama_barang = :nama_barang, harga = :harga, stok = :stok WHERE kode_barang = :original_kode_barang");
        $stmt->bindParam(':new_kode_barang', $data['kode_barang']);
        $stmt->bindParam(':nama_barang', $data['nama_barang']);
        $stmt->bindParam(':harga', $data['harga'], PDO::PARAM_INT);
        $stmt->bindParam(':stok', $data['stok'], PDO::PARAM_INT);
        $stmt->bindParam(':original_kode_barang', $original_kode_barang);
        $stmt->execute();

        return true;
    }

    public function deleteBarang($kode_barang)
    {
        $stmt = $this->db->prepare("DELETE FROM barang WHERE kode_barang = :kode_barang");
        $stmt->bindParam(':kode_barang', $kode_barang);
        return $stmt->execute();
    }
}
