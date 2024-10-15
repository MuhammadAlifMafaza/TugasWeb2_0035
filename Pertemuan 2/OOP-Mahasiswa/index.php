<?php
require_once 'MahasiswaSarjana.php';
require_once 'MahasiswaMagister.php';
require_once 'MahasiswaDoktor.php';
require_once 'Jurusan.php';

// Create instances
$jurusanTI = new Jurusan("Teknik Informatika");
$jurusanSI = new Jurusan("Sistem Informasi");

$mhs1 = new MahasiswaSarjana(
    "Alif Mafaza", "23.230.0035", "SI", 
    "Sistem Informasi Jaringan AI", 2024
);
$mhs2 = new MahasiswaMagister(
    "Siti Mahardia", "15.420.0242", "TI", 
    "Optimisasi Artificial Intelligence (AI)", "Dr. Agus"
);
$mhs3 = new MahasiswaDoktor(
    "Adi Suharjdono", "07.320.4289", "TI", 
    "Quantum Computing", "2024-12-15"
);

// Add IPS scores
$mhs1->tambahIPS(3.5);
$mhs1->tambahIPS(3.8);
$mhs2->tambahIPS(4.0);
$mhs3->tambahIPS(3.9);

// Add students to department
$jurusanSI->tambahMahasiswa($mhs1);
$jurusanTI->tambahMahasiswa($mhs2);
$jurusanTI->tambahMahasiswa($mhs3);

// Print student list
$jurusanTI->cetakDaftarMahasiswa();
$jurusanSI->cetakDaftarMahasiswa();
?>
