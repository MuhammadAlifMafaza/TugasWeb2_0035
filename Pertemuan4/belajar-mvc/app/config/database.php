<?php
function getDBConnection() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=dbmvc', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }
}
?>