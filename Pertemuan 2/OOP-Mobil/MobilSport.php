<?php
require_once 'Mobil.php';

class MobilSport extends Mobil {
    private $speed;
    private $turbo;

    public function __construct($nama, $merk, $speed, $turbo) {
        parent::__construct($nama, $merk);
        $this->speed = $speed;
        $this->turbo = $turbo;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Kecepatan Maksimal: {$this->speed} km/jam\n";
        echo "Turbo: " . ($this->turbo ? "Aktif" : "Tidak Aktif") . "\n";
    }
}
?>
