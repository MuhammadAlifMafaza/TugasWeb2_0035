<?php
    // include class Mobil.php
    require_once "Mobil.php";
    // Inisialisasi variabel (objek) mobilSatu
    $mobilSatu = new Mobil("Avanza", "Toyota");
    $mobilSatu->tahun = 2019;

    // membuat objek mobilDua
    $mobilDua = new Mobil("Brio", null);
    $mobilDua->tahun = 2020;

    // mengakses function infoMobil()
    echo $mobilSatu->infoMobil() . PHP_EOL;
    echo $mobilDua->infoMobil() . PHP_EOL;

    // memanggil dan menampilkan constant
    echo Mobil::AUTHOR;

?>
