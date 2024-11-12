<?php
require_once 'app/models/Transaksi.php';

class TransaksiController {
    public $transaksiModel;

    public function __construct($dbConnection) {
        $this->transaksiModel = new User($dbConnection);
    }

    public function show($id) {
        $user = $this->transaksiModel->getDataById($id);
        return $user; // Mengembalikan data pengguna
    }

    public function getAllUsers() {
        return $this->transaksiModel->tampilData();
    }

    public function addUser($name, $email) {
        return $this->transaksiModel->tambahData($name, $email);
    }

    public function updateUser($id, $name, $email) {
        return $this->transaksiModel->editData($id, $name, $email);
    }

    public function deleteUser($id) {
        return $this->transaksiModel->hapusData($id);
    }
    
}
?>
