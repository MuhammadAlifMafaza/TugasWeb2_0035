<?php
    class Buah{
        // properti
        protected $nama;        
    }
    class Jeruk extends Buah{
        function infoBuah(){
            echo"ini method info buah di kelas jeruk";
        }
    }

    // objek
    $buahJeruk = new Jeruk();
    $buahJeruk->nama = "Jeruk Bali";
    echo $buahJeruk->nama;
?>