<?php
require_once 'app/models/User.php';

class UserController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection);
    }

    public function show($id){
        // Mengambil data pengguna dari model
        $user = $this->userModel->getUserById($id);

        // Membuat view dan meneruskan data pengguna
        require_once 'app/views/UserView.php';
    }

    
}
?>