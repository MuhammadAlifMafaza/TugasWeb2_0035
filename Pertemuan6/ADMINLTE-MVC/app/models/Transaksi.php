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
    
    // Mendapatkan ID transaksi berikutnya dengan format TXN-001, TXN-002, dst.
    public function getNextTransaksiId() {
        // Ambil transaksi terakhir berdasarkan ID
        $stmt = $this->db->prepare("SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1");
        $stmt->execute();
        $lastTransaksi = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($lastTransaksi) {
            // Ambil nomor terakhir dan tambahkan 1
            $lastId = substr($lastTransaksi['id_transaksi'], 4); // Ambil angka setelah 'TXN-'
            $nextId = intval($lastId) + 1; // Tambahkan 1
            return 'TXN-' . str_pad($nextId, 3, '0', STR_PAD_LEFT); // Formatkan dengan padding 3 digit
        } else {
            // Jika belum ada transaksi, mulai dengan TXN-001
            return 'TXN-001';
        }
    }
    
    // Menambahkan transaksi baru
    public function tambahTransaksi($kodeBarang, $idPelanggan, $jumlah, $harga, $tanggal) {
        // Dapatkan ID transaksi berikutnya
        $idTransaksi = $this->getNextTransaksiId();

        // Hitung total_harga berdasarkan jumlah dan harga barang
        $totalHarga = $jumlah * $harga;

        $query = "INSERT INTO transaksi (id_transaksi, kode_barang, id_pelanggan, jumlah, total_harga, tanggal) 
                  VALUES (:id_transaksi, :kode_barang, :id_pelanggan, :jumlah, :total_harga, :tanggal)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_transaksi', $idTransaksi);
        $stmt->bindParam(':kode_barang', $kodeBarang);
        $stmt->bindParam(':id_pelanggan', $idPelanggan);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':total_harga', $totalHarga);
        $stmt->bindParam(':tanggal', $tanggal);
        return $stmt->execute();
    }

}
?>
