<?php
    class Database {
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $database = "db_php";
        public $connect;
    
        function __construct() {
            $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            if (mysqli_connect_errno()) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }
    
        function tampilData() {
            $query = "SELECT * FROM tb_users";
            $result = mysqli_query($this->connect, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    
        function tambahData($nama, $alamat, $nohp) {
            $query = "INSERT INTO tb_users (nama, alamat, nohp) VALUES ('$nama', '$alamat', '$nohp')";
            mysqli_query($this->connect, $query);
        }
    
        function getDataById($id) {
            $query = "SELECT * FROM tb_users WHERE id='$id'";
            $result = mysqli_query($this->connect, $query);
            return mysqli_fetch_assoc($result);
        }
    
        function editData($id, $nama, $alamat, $nohp) {
            $query = "UPDATE tb_users SET nama='$nama', alamat='$alamat', nohp='$nohp' WHERE id='$id'";
            mysqli_query($this->connect, $query);
        }
    
        function hapusData($id) {
            $query = "DELETE FROM tb_users WHERE id='$id'";
            mysqli_query($this->connect, $query);
        }
    }
    
?>