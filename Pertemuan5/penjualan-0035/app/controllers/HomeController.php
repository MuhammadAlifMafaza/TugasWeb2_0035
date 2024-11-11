<?php
class HomeController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        include 'views/Home/Home.php';
    }
}
