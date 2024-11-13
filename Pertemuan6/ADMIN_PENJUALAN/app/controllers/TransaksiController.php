<?php
require_once 'app/models/Transaksi.php';
require_once 'app/models/Barang.php';
require_once 'app/models/Pelanggan.php';

class TransaksiController
{
    private $transaksiModel;
    private $barangModel;
    private $pelangganModel;

    public function __construct($dbConnection)
    {
        $this->transaksiModel = new Transaksi($dbConnection);
        $this->barangModel = new Barang($dbConnection);
        $this->pelangganModel = new Pelanggan($dbConnection);
    }

    public function getTransaksiByid_transaksi($id_transaksi)
    {
        return $this->transaksiModel->getTransaksiByid_transaksi($id_transaksi);
    }

    public function index()
    {
        $transaksi = $this->transaksiModel->getAllTransaksi();
        require_once 'app/views/Transaksi/index.php';
    }

    public function addTransaksi()
    {
        $transaksi = $this->barangModel->getAllBarang();
        $pelanggan = $this->pelangganModel->getAllPelanggan();
        require_once 'app/views/Transaksi/add.php';
    }

    public function storeTransaksi()
    {
        header('Content-Type: application/json');
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Menyiapkan data untuk transaksi utama dan detail transaksi
            $data = [
                'id_pelanggan' => $_POST['id_pelanggan'],
                'total_harga' => $_POST['total_harga'],
                'kode_barang' => $_POST['kode_barang'], // Array kode barang dari keranjang
                'jumlah' => $_POST['jumlah'], // Array jumlah barang dari keranjang
                'harga' => $_POST['harga'], // Array harga satuan barang dari keranjang
            ];
    
            // Memanggil model untuk menambahkan transaksi
            if ($this->transaksiModel->addTransaksi($data)) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Transaksi berhasil ditambahkan'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Gagal menambahkan transaksi. Silakan coba lagi.'
                ]);
            }
    
            exit();
        }
    }
    

    public function detailTransaksi($id_transaksi)
    {
        $transaksiDetails = $this->transaksiModel->getTransaksiById($id_transaksi);
        $transaksi = $transaksiDetails[0]; // Data utama transaksi
        $detailBarang = array_slice($transaksiDetails, 1); // Data detail barang
    
        require_once 'app/views/Transaksi/detail.php';
    }
    
}
