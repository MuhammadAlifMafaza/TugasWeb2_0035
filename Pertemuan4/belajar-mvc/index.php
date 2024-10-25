<?php
// index.php
try {
    $dbConnection = new PDO('mysql:host=localhost;dbname=dbmvc', 'root', '');
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

require_once 'app/controllers/UserController.php';
$controller = new UserController($dbConnection);
require 'app/views/UserListView.php'; // Load the user list view
require 'app/views/UserListView.php'; // Load the user list view
require 'app/views/UserListView.php'; // Load the user list view
?>
