<?php
require_once 'app/models/Barang.php';

class BarangController
{
    private $barangModel;

    public function __construct($dbConnection)
    {
        $this->barangModel = new Barang($dbConnection);
    }

    public function getBarangBykode_barang($kode_barang)
    {
        return $this->barangModel->getBarangBykode_barang($kode_barang);
    }

    public function index()
    {
        $barang = $this->barangModel->getAllBarang();
        require_once 'app/views/Barang/index.php';
    }

    public function addBarang()
    {
        require_once 'app/views/Barang/add.php';
    }

    public function view($kode_barang)
    {
        $data = $this->barangModel->getBarangBykode_barang($kode_barang);
        require_once 'app/views/detail.php';
    }

    public function storeBarang($data)
    {
        header('Content-Type: application/json');

        if ($this->barangModel->addBarang($data)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Barang berhasil ditambahkan'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Kode barang sudah ada!'
            ]);
        }

        exit(); // Tambahkan exit untuk menghentikan script
    }

    public function editBarang($kode_barang)
    {
        $barang = $this->barangModel->getBarangBykode_barang($kode_barang);

        if (!$barang) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Data barang tidak ditemukan!'
            ];
            header("Location: index.php?action=barang");
            exit();
        }

        require_once 'app/views/Barang/edit.php';
    }

    public function updateBarang($kode_barang, $data)
    {
        header('Content-Type: application/json');

        if ($data['kode_barang'] !== $kode_barang && $this->barangModel->isBarangExists($data['kode_barang'], $kode_barang)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Kode barang sudah ada!'
            ]);
            exit();
        }

        $result = $this->barangModel->updateBarang($kode_barang, $data);

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Barang berhasil diperbarui'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memperbarui barang'
            ]);
        }
        exit();
    }

    public function deleteBarang($kode_barang)
    {
        header('Content-Type: application/json');

        $result = $this->barangModel->deleteBarang($kode_barang);

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Barang berhasil dihapus'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus barang'
            ]);
        }

        exit();
    }
}
