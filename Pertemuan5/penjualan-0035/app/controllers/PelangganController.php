<?php
require_once 'app/models/Pelanggan.php';

class PelangganController {
    public $PelangganModel;

    public function __construct($dbConnection) {
        $this->PelangganModel = new Pelanggan($dbConnection);
    }

    public function show($id) {
        $Pelanggan = $this->PelangganModel->getDataById($id);
        return $Pelanggan; // Mengembalikan data pengguna
    }

    public function getAllPelanggans() {
        return $this->PelangganModel->tampilData();
    }

    public function addPelanggan($name, $email) {
        return $this->PelangganModel->tambahData($name, $email);
    }

    public function updatePelanggan($id, $name, $email) {
        return $this->PelangganModel->editData($id, $name, $email);
    }

    public function deletePelanggan($id) {
        return $this->PelangganModel->hapusData($id);
    }
    
}
?>
