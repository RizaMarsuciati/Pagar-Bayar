-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Des 2018 pada 16.53
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `kodetestimoni` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `pesan` varchar(500) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`kodetestimoni`, `nama`, `email`, `notelp`, `pesan`, `rating`) VALUES
(2, 'Riza', 'rizamarsuciati@gmail.com', '085921282598', 'ok', 3),
(3, 'Sandi', 'jeprisandy@gmail.com', '082226620365', 'Good', 3),
(4, 'Cahya', 'cahyawst@yahoo.com', '087788663311', 'ok lah', 2),
(5, 'Cahya Wahyu Sanditama', 'suhada.setiawan@students.amikom.ac.id', '082220437430', 'Mantap.................................', 3),
(6, 'Suhada Budi S', 'suhadabudi@gmail.com', '098987876765', 'Pelayanan bagus mas', 3),
(7, 'Fais Roshifia L', 'pagarbayar@gmail.com', '098987876765', 'mantuk', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`kodetestimoni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `kodetestimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
