<?php
class ProdukController {
    private $produkModel;

    public function __construct($database) {
        $this->produkModel = new Barang($database);
    }

    public function index() {
        $produkList = $this->produkModel->getAllBarang();
        include '../index.php';
    }    

    public function test() {
        echo "ProdukController is working!";
    }
    
    // Methods for other actions (e.g., add, update, delete)
}
?>
