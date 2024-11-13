<?php
require_once 'app/models/Pelanggan.php';

class PelangganController
{
    private $pelangganModel;

    public function __construct($dbConnection)
    {
        $this->pelangganModel = new Pelanggan($dbConnection);
    }
    public function index()
    {
        $pelanggan = $this->pelangganModel->getAllPelanggan();
        require_once 'app/views/Pelanggan/index.php';
    }

    public function addPelanggan()
    {
        require_once 'app/views/Pelanggan/add.php';
    }

    public function storePelanggan($data)
    {
        header('Content-Type: application/json');

        if ($this->pelangganModel->addPelanggan($data)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Pelanggan berhasil ditambahkan'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Kode Pelanggan sudah ada!'
            ]);
        }

        exit(); 
    }

    public function editPelanggan($id_pelanggan)
    {
        $pelanggan = $this->pelangganModel->getPelangganByid_pelanggan($id_pelanggan);

        if (!$pelanggan) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Data Pelanggan tidak ditemukan!'
            ];
            header("Location: index.php?action=pelanggan");
            exit();
        }

        require_once 'app/views/Pelanggan/edit.php';
    }

    public function updatePelanggan($id_pelanggan, $data)
    {
        header('Content-Type: application/json');

        if ($data['id_pelanggan'] !== $id_pelanggan && $this->pelangganModel->isPelangganExists($data['id_pelanggan'], $id_pelanggan)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Kode Pelanggan sudah ada!'
            ]);
            exit();
        }

        $result = $this->pelangganModel->updatePelanggan($id_pelanggan, $data);

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Pelanggan berhasil diperbarui'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memperbarui Pelanggan'
            ]);
        }
        exit();
    }

    public function deletePelanggan($id_pelanggan)
    {
        header('Content-Type: application/json');

        $result = $this->pelangganModel->deletePelanggan($id_pelanggan);

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Pelanggan berhasil dihapus'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus Pelanggan'
            ]);
        }

        exit();
    }
}
