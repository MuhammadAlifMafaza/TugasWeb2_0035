<?php

class HomeModel
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getCounts()
    {
        $counts = [];

        // Hitung total barang
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total_barang FROM barang");
        $stmt->execute();
        $counts['total_barang'] = $stmt->fetchColumn();

        // Hitung total pelanggan
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total_pelanggan FROM pelanggan");
        $stmt->execute();
        $counts['total_pelanggan'] = $stmt->fetchColumn();

        // Hitung total transaksi
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total_transaksi FROM transaksi");
        $stmt->execute();
        $counts['total_transaksi'] = $stmt->fetchColumn();

        return $counts;
    }
}
