<?php
require_once 'Mahasiswa.php';

class MahasiswaDoktor extends Mahasiswa {
    private $judulDisertasi;
    private $tanggalSidang;

    public function __construct($nama, $nim, $jurusan, $judulDisertasi, $tanggalSidang) {
        parent::__construct($nama, $nim, $jurusan);
        $this->judulDisertasi = $judulDisertasi;
        $this->tanggalSidang = $tanggalSidang;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Judul Disertasi: {$this->judulDisertasi}\n";
        echo "Tanggal Sidang: {$this->tanggalSidang}\n";
    }
}
?>
