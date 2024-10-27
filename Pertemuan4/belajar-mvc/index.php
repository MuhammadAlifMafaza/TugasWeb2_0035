<?php
// index.php

// Mengatur koneksi database menggunakan fungsi dari database.php
require_once 'app/config/database.php'; 
$dbConnection = getDBConnection();

// Mengimpor UserController dan inisialisasi
require_once 'app/controllers/UserController.php';
$controller = new UserController($dbConnection);

// Menampilkan view daftar pengguna
require 'app/views/UserListView.php'; 

// require 'app/views/UserInputView.php'; // Load the user input view
// require 'app/views/UserUpdateView.php'; // Load the user update view
// require 'app/views/UserDetailView.php'; // Load the user detail view
?>
