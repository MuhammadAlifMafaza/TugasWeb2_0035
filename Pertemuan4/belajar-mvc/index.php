<?php
require_once 'app/config/database.php';
require_once 'app/controllers/UserController.php';

$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $controller->show($_GET['id']); // Show specific user if ID is present
} else {
    require 'app/views/UserListView.php'; // Otherwise, show all users
}
?>