<?php
require_once 'Mahasiswa.php';

class MahasiswaSarjana extends Mahasiswa {
    private $judulSkripsi;
    private $tahunSelesai;

    public function __construct($nama, $nim, $jurusan, $judulSkripsi, $tahunSelesai) {
        parent::__construct($nama, $nim, $jurusan);
        $this->judulSkripsi = $judulSkripsi;
        $this->tahunSelesai = $tahunSelesai;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Judul Skripsi: {$this->judulSkripsi}\n";
        echo "Tahun Selesai: {$this->tahunSelesai}\n";
    }
}
?>
