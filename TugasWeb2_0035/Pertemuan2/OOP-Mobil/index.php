<?php
require_once 'MobilSport.php';
require_once 'MobilKota.php';

// Create instances
$mobilSport = new MobilSport("Ferrari SF90", "Ferrari", 340, true);
$cityCar = new CityCar("Jazz", "Honda", "2024", 18);

// Print information
echo "Informasi Mobil Sport:\n";
$mobilSport->cetakInfo();
echo "\n-----------------------\n";
echo "Informasi City Car:\n";
$cityCar->cetakInfo();
?>
