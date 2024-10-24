<?php
    class Mobil{
        const AUTHOR = "Ryugazaki";
        var $nama;
        var ?string $merk = null;
        var int $tahun;

        public function __construct(string $nama, ?string $merk){
            $this->nama = $nama;
            $this->merk = $merk;
        }

        function tambahanKecepatan(){
            echo "Kecepatan Bertambah!";
        }

        // function infoMobil()
        function infoMobil(){
            return "$this->nama, $this->merk, $this->tahun;";
        }
    }
?>
