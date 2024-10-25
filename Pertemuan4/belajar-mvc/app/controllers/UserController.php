<?php
require_once 'app/models/User.php';

class UserController {
    public $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection);
    }

    public function show($id) {
        // Get user data from model
        $user = $this->userModel->getUserById($id);

        // Create view and pass user data
        require_once 'app/views/UserListView.php';
    }

    public function getAllUsers() {
        return $this->userModel->tampilData(); // This should call the tampilData() method
    }
}
?>
