<?php
// TransaksiController.php
require_once 'app/models/Transaksi.php';

class TransaksiController {
    private $transaksiModel;

    public function __construct($dbConnection) {
        $this->transaksiModel = new Transaksi($dbConnection);
    }

    public function index() {
        // Cek apakah ada id_transaksi di URL untuk detail Transaksi
        $idTransaksi = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : null;

        if ($idTransaksi) {
            // Jika id_transaksi ada, ambil data Transaksi spesifik
            $transaksi = $this->transaksiModel->getTransaksiById($idTransaksi);
            include_once 'app/views/Transaksi/TransaksiDetailView.php'; // View untuk detail Transaksi
        } else {
            // Jika tidak ada id_transaksi, tampilkan semua Transaksi
            $transaksiList = $this->transaksiModel->tampilTransaksi();
            include_once 'app/views/Transaksi/TransaksiListView.php'; // View untuk daftar Transaksi
        }
    }

    public function addTransaksi() {
        // Tampilkan form untuk tambah Transaksi
        include_once 'app/views/Transaksi/TransaksiInputView.php';
    }

    public function simpan() {
        // Ambil data dari form POST
        $kodeBarang = $_POST['kode_barang'];
        $idPelanggan = $_POST['id_pelanggan'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];
    
        try {
            // Panggil metode tambahTransaksi pada model (ID transaksi sudah ditambahkan otomatis)
            $this->transaksiModel->tambahTransaksi($kodeBarang, $idPelanggan, $jumlah, $harga, $tanggal);
            // Redirect ke halaman index Transaksi setelah berhasil menambah data
            header("Location: ?page=transaksi&action=index");
        } catch (Exception $e) {
            // Jika terjadi error, arahkan kembali ke form input dengan pesan error
            header("Location: ?page=transaksi&action=addTransaksi&error=duplicate");
        }
        exit();
    }
    
    public function detail() {
        // Ambil id_transaksi dari URL
        $idTransaksi = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : null;
    
        if ($idTransaksi) {
            // Ambil data transaksi berdasarkan id_transaksi
            $transaksi = $this->transaksiModel->getTransaksiById($idTransaksi);
            // Tampilkan view detail transaksi
            include_once 'app/views/Transaksi/TransaksiDetailView.php';
        } else {
            // Jika tidak ada id_transaksi, redirect ke daftar transaksi
            header("Location: ?page=transaksi&action=index");
        }
    }
    
}
?>
