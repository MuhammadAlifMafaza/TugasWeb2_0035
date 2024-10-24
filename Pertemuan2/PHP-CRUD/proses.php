<?php
include 'database.php';
$db = new Database();

$aksi = $_GET['aksi'];

if ($aksi == "tambah") {
    $db->tambahData($_POST['nama'], $_POST['alamat'], $_POST['nohp']);
    header('Location: index.php');
} elseif ($aksi == "update") {
    $db->editData($_POST['id'], $_POST['nama'], $_POST['alamat'], $_POST['nohp']);
    header('Location: index.php');
} elseif ($aksi == "hapus") {
    $db->hapusData($_GET['id']);
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href='index.php';
          </script>";
}
?>
