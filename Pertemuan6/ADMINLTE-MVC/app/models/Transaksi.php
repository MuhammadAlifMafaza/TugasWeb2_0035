<?php
// models/Transaksi.php

class Transaksi {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Mendapatkan data transaksi berdasarkan id_transaksi
    public function getTransaksiById($id_transaksi) {
        $stmt = $this->db->prepare("SELECT * FROM transaksi WHERE id_transaksi = :id_transaksi");
        $stmt->bindParam(':id_transaksi', $id_transaksi);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan hasil transaksi atau null jika tidak ditemukan
    }
    
    // Menampilkan semua data transaksi
    public function tampilTransaksi() {
        $stmt = $this->db->prepare("SELECT id_transaksi, kode_barang, id_pelanggan, jumlah, total_harga, tanggal FROM transaksi");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengidentifikasi apakah kode barang sudah ada dalam transaksi tertentu
    public function transaksiExists($kodeBarang) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM transaksi WHERE kode_barang = :kode_barang");
        $stmt->bindParam(':kode_barang', $kodeBarang);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Menambahkan transaksi baru
    public function tambahTransaksi($kodeBarang, $idPelanggan, $jumlah, $harga, $tanggal) {
        // Cek apakah transaksi dengan kode barang ini sudah ada
        if ($this->transaksiExists($kodeBarang)) {
            throw new Exception("Kode barang '$kodeBarang' sudah ada dalam transaksi. Silakan gunakan kode yang berbeda.");
        }

        // Hitung total_harga berdasarkan jumlah dan harga barang
        $totalHarga = $jumlah * $harga;

        $query = "INSERT INTO transaksi (kode_barang, id_pelanggan, jumlah, total_harga, tanggal) 
                  VALUES (:kode_barang, :id_pelanggan, :jumlah, :total_harga, :tanggal)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $kodeBarang);
        $stmt->bindParam(':id_pelanggan', $idPelanggan);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':total_harga', $totalHarga);
        $stmt->bindParam(':tanggal', $tanggal);
        return $stmt->execute();
    }

}
?>
