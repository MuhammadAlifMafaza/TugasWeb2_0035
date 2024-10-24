<?php
    class Buah  {
        // properti
        public $nama;
        public $warna;
    }

    // membuat objek data
    $Pisang = new Buah();
    $Semangka = new Buah();
    $Mangga = new Buah();
    $Jeruk = new Buah();
    $Melon = new Buah();

    // menambahkan properti pada objek
    $Pisang -> nama = "Pisang Ambon";
    $Pisang -> warna = "Kuning";

    $Mangga -> nama = "Mangga Arumanis";
    $Mangga -> warna = "Hijau";

    $Semangka -> nama = "Semangka Merah Manis";
    $Semangka -> warna = "Hijau";

    $Melon -> nama = "Melon Madu";
    $Melon -> warna = "Hijau Muda";

    $Jeruk -> nama = "Jeruk Nipis";
    $Jeruk -> warna = "Hijau";

    echo $Jeruk -> nama;
?>