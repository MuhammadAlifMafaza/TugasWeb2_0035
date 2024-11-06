<?php
require_once 'app/models/User.php';

class UserController {
    public $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection);
    }

    public function show($id) {
        $user = $this->userModel->getDataById($id);
        return $user; // Mengembalikan data pengguna
    }

    public function getAllUsers() {
        return $this->userModel->tampilData();
    }

    public function addUser($name, $email) {
        return $this->userModel->tambahData($name, $email);
    }

    public function updateUser($id, $name, $email) {
        return $this->userModel->editData($id, $name, $email);
    }

    public function deleteUser($id) {
        return $this->userModel->hapusData($id);
    }
    
}
?>
