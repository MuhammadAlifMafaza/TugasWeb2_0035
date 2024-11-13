<?php
// database.php

// Fungsi untuk mendapatkan koneksi database
function getDBConnection() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=dbpenjualan_0035', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }
}
?>
