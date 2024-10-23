<?php
class Mahasiswa {
    protected $nama;
    protected $nim;
    protected $jurusan;
    protected $ips = [];  // Array to store IPS per semester
    protected $ipk;

    public function __construct($nama, $nim, $jurusan) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
    }

    public function cetakInfo() {
        echo "Nama: {$this->nama}\n";
        echo "NIM: {$this->nim}\n";
        echo "Jurusan: {$this->jurusan}\n";
        echo "IPK: " . $this->hitungIPK() . "\n";
    }

    public function tambahIPS($ips) {
        $this->ips[] = $ips;
    }

    public function hitungIPK() {
        $total = array_sum($this->ips);
        $this->ipk = count($this->ips) > 0 ? $total / count($this->ips) : 0;
        return $this->ipk;
    }
}
?>
