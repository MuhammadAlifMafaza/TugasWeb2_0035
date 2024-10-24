<?php
    class ConstructBuah{
        // properti
        public $nama;
        public $warna;

        function __construct($a, $b) {
            $this -> nama = $a;
            $this -> warna = $b;
        } function infoBuah(){
            echo "Nama buah $this->nama dan warna buah $this->warna";
        }
    }
    // membuat objek
    $jeruk = new ConstructBuah("jeruk Bali", "Hijau");
    // mengakses method
    $jeruk->infoBuah();
?>