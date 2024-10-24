<?php
require_once 'Mahasiswa.php';

class MahasiswaMagister extends Mahasiswa {
    private $judulTesis;
    private $pembimbing;

    public function __construct($nama, $nim, $jurusan, $judulTesis, $pembimbing) {
        parent::__construct($nama, $nim, $jurusan);
        $this->judulTesis = $judulTesis;
        $this->pembimbing = $pembimbing;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Judul Tesis: {$this->judulTesis}\n";
        echo "Pembimbing: {$this->pembimbing}\n";
    }
}
?>
