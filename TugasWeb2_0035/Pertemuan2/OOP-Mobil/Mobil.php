<?php
class Mobil {
    protected $nama;
    protected $merk;

    public function __construct($nama, $merk) {
        $this->nama = $nama;
        $this->merk = $merk;
    }

    public function cetakInfo() {
        echo "Nama: {$this->nama}\n";
        echo "Merk: {$this->merk}\n";
    }
}
?>
