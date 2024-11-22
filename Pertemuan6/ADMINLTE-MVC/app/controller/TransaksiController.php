<?php
// TransaksiController.php
require_once 'app/models/Transaksi.php';

class TransaksiController {
    private $transaksiModel;

    public function __construct($dbConnection) {
        $this->transaksiModel = new Transaksi($dbConnection);
    }

    // Menampilkan daftar transaksi atau detail transaksi jika id_transaksi diberikan
    public function index() {
        $idTransaksi = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : null;

        if ($idTransaksi) {
            // Jika id_transaksi ada, tampilkan detail transaksi
            $this->detail($idTransaksi);
        } else {
            // Jika tidak ada id_transaksi, tampilkan semua transaksi
            $transaksiList = $this->transaksiModel->tampilTransaksi();
            include_once 'app/views/Transaksi/TransaksiListView.php'; // View untuk daftar Transaksi
        }
    }

    // Menampilkan form input transaksi baru
    public function addTransaksi() {
        include_once 'app/views/Transaksi/TransaksiInputView.php';
    }

    // Menyimpan transaksi baru
    public function simpan() {
        $kodeBarang = $_POST['kode_barang'];
        $idPelanggan = $_POST['id_pelanggan'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];

        try {
            // Menambahkan transaksi baru
            $this->transaksiModel->tambahTransaksi($kodeBarang, $idPelanggan, $jumlah, $harga, $tanggal);
            // Redirect setelah berhasil menambah transaksi
            header("Location: ?page=transaksi&action=index");
        } catch (Exception $e) {
            // Tangani error dan redirect kembali ke form input jika terjadi masalah
            header("Location: ?page=transaksi&action=addTransaksi&error=duplicate");
        }
        exit();
    }

    // Menampilkan detail transaksi berdasarkan id_transaksi
    // TransaksiController.php
    public function detail() {
        // Ambil id_transaksi dari URL
        $idTransaksi = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : null;

        if ($idTransaksi) {
            // Ambil data transaksi berdasarkan id_transaksi
            $transaksi = $this->transaksiModel->detailTransaksi($idTransaksi); // Updated to use detailTransaksi method
            // Tampilkan view detail transaksi
            include_once 'app/views/Transaksi/TransaksiDetailView.php';
        } else {
            // Jika tidak ada id_transaksi, redirect ke daftar transaksi
            header("Location: ?page=transaksi&action=index");
            exit();
        }
    }
}
?>