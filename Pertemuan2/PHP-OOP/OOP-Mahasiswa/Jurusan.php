<?php
class Jurusan {
    private $namaJurusan;
    private $daftarMahasiswa = [];

    public function __construct($namaJurusan) {
        $this->namaJurusan = $namaJurusan;
    }

    public function tambahMahasiswa(Mahasiswa $mahasiswa) {
        $this->daftarMahasiswa[] = $mahasiswa;
    }

    public function cetakDaftarMahasiswa() {
        echo "Jurusan: {$this->namaJurusan}\n";
        echo "Daftar Mahasiswa:\n";
        foreach ($this->daftarMahasiswa as $mhs) {
            $mhs->cetakInfo();
            echo "----------------\n";
        }
    }
}
?>
