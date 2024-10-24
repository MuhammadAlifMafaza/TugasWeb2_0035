<?php
require_once 'Mobil.php';

class CityCar extends Mobil {
    private $model;
    private $iritBensin;

    public function __construct($nama, $merk, $model, $iritBensin) {
        parent::__construct($nama, $merk);
        $this->model = $model;
        $this->iritBensin = $iritBensin;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Model: {$this->model}\n";
        echo "Irit Bensin: {$this->iritBensin} km/liter\n";
    }
}
?>
