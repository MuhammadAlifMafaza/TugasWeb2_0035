<?php
require_once 'app/models/HomeModel.php';


class HomeController
{
    private $homeModel;

    public function __construct($dbConnection)
    {
        $this->homeModel = new HomeModel($dbConnection);
    }

    public function index()
    {
        $counts = $this->homeModel->getCounts();
        require_once 'app/views/Home/index.php';
    }
}
