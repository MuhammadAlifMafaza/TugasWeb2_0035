<?php
// UserController.php

require_once 'app/models/User.php';

class UserController {
    public $userModel;

    // Menginisialisasi model pengguna
    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection);
    }

    // Mendapatkan data pengguna berdasarkan ID
    public function show($id) {
        $user = $this->userModel->getDataById($id); // Memperbaiki pemanggilan method
        require_once 'app/views/UserDetailView.php'; // Memanggil view detail pengguna
    }

    // Mengambil semua pengguna
    public function getAllUsers() {
        return $this->userModel->tampilData(); 
    }

    // Menambahkan pengguna baru
    public function addUser($name, $email) {
        return $this->userModel->tambahData($name, $email);
    }

    // Mengedit pengguna
    public function updateUser($id, $name, $email) {
        return $this->userModel->editData($id, $name, $email);
    }
}
?>
