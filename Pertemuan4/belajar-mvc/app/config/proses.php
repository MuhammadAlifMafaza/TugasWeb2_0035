<?php
include_once 'database.php';

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];
    $user = new User();
    if ($user->hapusData($id)) {
        header("Location: index.php?message=Data berhasil dihapus");
        exit;
    } else {
        header("Location: index.php?message=Gagal menghapus data");
        exit;
    }
}

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function tambahData($nama, $alamat, $jenis_kelamin, $nohp, $email, $foto) {
        $query = "INSERT INTO tb_users (nama, alamat, jenis_kelamin, nohp, email, foto) VALUES (:nama, :alamat, :jenis_kelamin, :nohp, :email, :foto)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
        $stmt->bindParam(':nohp', $nohp);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':foto', $foto);
        return $stmt->execute();
    }

    public function editData($id, $nama, $alamat, $jenis_kelamin, $nohp, $email, $foto) {
        $query = "UPDATE tb_users SET nama = :nama, alamat = :alamat, jenis_kelamin = :jenis_kelamin, nohp = :nohp, email = :email" . ($foto ? ", foto = :foto" : "") . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
        $stmt->bindParam(':nohp', $nohp);
        $stmt->bindParam(':email', $email);
        if ($foto) {
            $stmt->bindParam(':foto', $foto);
        }
        return $stmt->execute();
    }

    public function hapusData($id) {
        $query = "DELETE FROM tb_users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function tampilData() {
        $query = "SELECT * FROM tb_users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataById($id) {
        $query = "SELECT * FROM tb_users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
