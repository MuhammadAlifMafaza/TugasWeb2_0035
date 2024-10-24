<?php
    class Buah {
    // Properties
    public $nama;
    public $warna;

    // Methods
    function aturWarna($warnaBaru) {
        $this->warna = $warnaBaru;
    }

    function tampilDeskripsi() {
        echo "Buah $this->nama berwarna $this->warna";
    }
    }
    $pisang = new Buah();
    $pisang->nama = "Pisang";
    $pisang->aturWarna('Kuning');

    echo $pisang->nama;
    echo "<br>";
    echo $pisang->warna;
    echo "<br>";
    echo $pisang->tampilDeskripsi();
?>