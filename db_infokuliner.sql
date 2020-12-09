-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2020 pada 04.15
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_infokuliner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kuliner`
--

CREATE TABLE `data_kuliner` (
  `id` int(11) NOT NULL,
  `Jenis_Kuliner` set('Makanan','Minuman') NOT NULL,
  `Nama_Kuliner` varchar(45) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kuliner`
--

INSERT INTO `data_kuliner` (`id`, `Jenis_Kuliner`, `Nama_Kuliner`, `Keterangan`, `id_admin`, `photo`) VALUES
(75, 'Minuman', 'Dalgona', 'Kopi Hits Zaman now', 1, 'dalgona.jpg'),
(76, 'Makanan', 'Kerak Telor', 'Makanan khas Betawi', 1, 'kerak-telor.jpg'),
(77, 'Makanan', 'Mie Kober', 'mie pedas', 1, 'kober.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_login`
--

CREATE TABLE `data_login` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `active` set('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_login`
--

INSERT INTO `data_login` (`id`, `email`, `password`, `active`) VALUES
(1, 'gitaoktayani@gmail.com', '8b976b8a0d658f6f4e4e0bde932f5bc6', 'Y'),
(2, 'gita.oktayani@undiksha.ac.id', 'afac2129d1b85dc057588b8663472ac3', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `Nama_Resep` varchar(45) NOT NULL,
  `Resep` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id`, `Nama_Resep`, `Resep`, `id_admin`) VALUES
(3, 'Mie Goreng', 'resep mie goreng.docx.pdf', 1),
(4, 'Bakso ayam', 'resep bakso.pdf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_makan`
--

CREATE TABLE `tempat_makan` (
  `id` int(11) NOT NULL,
  `Nama_Tempat` varchar(45) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Maps` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempat_makan`
--

INSERT INTO `tempat_makan` (`id`, `Nama_Tempat`, `Alamat`, `Maps`, `id_admin`) VALUES
(1, 'Richeese Factory Denpasar', 'Tengah, Jl. Gatot Subroto Barat Desa No.1, Pemecutan Kaja, Kec. Denpasar Bar., Kota Denpasar, Bali 8', 'https://goo.gl/maps/fNgyznKEZBZjDhbF9', 1),
(3, 'Ngerodok Resto', 'Jl. Mulawarman No.132A, Abianbase, Kec. Gianyar, Kabupaten Gianyar, Bali 80515', 'https://goo.gl/maps/mj4gkBCYZzoRDGFR7', 1),
(4, 'tempong', 'Jalan Udayana', 'https://goo.gl/maps/fNgyznKEZBZjDhbF9', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kuliner`
--
ALTER TABLE `data_kuliner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tempat_makan`
--
ALTER TABLE `tempat_makan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kuliner`
--
ALTER TABLE `data_kuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tempat_makan`
--
ALTER TABLE `tempat_makan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
