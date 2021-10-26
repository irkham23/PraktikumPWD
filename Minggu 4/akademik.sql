-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Okt 2021 pada 13.26
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(5) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  `jkel` varchar(1) DEFAULT NULL,
  `alamat` text,
  `tgllhr` date DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jkel`, `alamat`, `tgllhr`, `agama`) VALUES
('', 'Irkham Taufik Abimanyu', '', '', '0000-00-00', ''),
('MHS01', 'Siti', 'P', 'SOLO', '1997-01-01', 'Islam'),
('MHS02', 'Rita Wulandari', 'P', 'SOLO', '1997-01-23', 'KHATOLIK'),
('MHS04', 'Siti Maryam', 'P', 'JAKARTA', '1995-04-15', 'ISLAM'),
('MHS05', 'Maulana Syahputra', 'L', 'Cikarang', '1998-12-12', 'Islam'),
('MHS06', 'Aditya Wiratama', 'L', 'Gunungkidul', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `website`, `komentar`, `gender`) VALUES
(11, 'Irkham Taufik Abimanyu', 'irkham1800018147@webmail.uad.ac.id', 'example.com', 'PEMROGRAMAN WEB DINAMIS MINGGU 4', 'Laki-Laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
