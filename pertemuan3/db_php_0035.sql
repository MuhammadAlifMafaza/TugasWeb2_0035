-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2024 pada 15.04
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_php_0035`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_edit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `alamat`, `jenis_kelamin`, `nohp`, `email`, `foto`, `waktu_buat`, `waktu_edit`) VALUES
(4, 'Muhammad Alif Mafaza', 'Jl. Prisma 1 No.04', 'Laki-Laki', '085201122228', 'muhammadalifmafaza@gmail.com', 'uploads/IMG_20230424_082418_300.webp', '2024-10-20 12:12:53', '2024-10-20 12:17:59'),
(5, 'ARI PUTRA WIBOWO, S.KOM	', 'Kemayoran', 'Laki-Laki', '01571092571290', 'ariputrawibowo@gmail.com', 'uploads/Potrait.jpg', '2024-10-20 12:56:14', '2024-10-20 12:56:14'),
(6, 'Joko Widodo', 'Yogyakarta', 'Laki-Laki', '021510251805', 'widodo@gmail.com', 'uploads/Joko_Widodo_2019_official_portrait.jpg', '2024-10-20 13:01:37', '2024-10-20 13:01:37'),
(7, 'Susilo Bambang Yudhoyono', 'Jakarta', 'Laki-Laki', '021581025810', 'BambangYudhoyono@gmail.com', 'uploads/Presiden_Susilo_Bambang_Yudhoyono.png', '2024-10-20 13:02:21', '2024-10-20 13:02:21'),
(8, 'Soekarno', 'Klaten', 'Laki-Laki', '085421907150715', 'soekarnoJaya@gmail.com', 'uploads/Presiden_Sukarno.jpg', '2024-10-20 13:03:00', '2024-10-20 13:03:00'),
(9, 'Prabowo Subianto', 'Bandung', 'Laki-Laki', '085210852120', 'prabowosubianto231@gmail.com', 'uploads/Prabowo_Subianto_2024_official_portrait.jpg', '2024-10-20 13:03:59', '2024-10-20 13:03:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
