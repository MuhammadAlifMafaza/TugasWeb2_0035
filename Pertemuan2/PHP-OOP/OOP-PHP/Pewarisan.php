<?php
    class Pewarisan{
        // properti
        public $nama;
        public $warna;

        // method
        function infoBuah(){
            echo"Anda mengakses method info buah";
        }      
    }
    class WarisanBuah extends Pewarisan {

    }

    $jeruk = new WarisanBuah();
    $jeruk->infoBuah();
?>