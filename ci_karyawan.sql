-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Agu 2020 pada 22.20
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_karyawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_karyawan`
--

CREATE TABLE `ci_karyawan` (
  `k_id` int(3) NOT NULL,
  `k_name` varchar(25) NOT NULL,
  `k_induk` int(15) NOT NULL,
  `k_alamat` text NOT NULL,
  `k_dateadd` datetime NOT NULL,
  `k_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ci_karyawan`
--

INSERT INTO `ci_karyawan` (`k_id`, `k_name`, `k_induk`, `k_alamat`, `k_dateadd`, `k_status`) VALUES
(1, 'alfanq', 1234567890, 'sambilawang', '2019-10-30 08:34:09', 1),
(2, 'aldan', 123321123, 'sambilawang', '2019-10-27 09:50:00', 1),
(3, 'amelia', 2147483647, 'pati', '2019-10-27 08:20:00', 1),
(4, 'andika', 2147483647, 'pati', '2019-11-29 09:34:09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_karyawan`
--
ALTER TABLE `ci_karyawan`
  ADD PRIMARY KEY (`k_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_karyawan`
--
ALTER TABLE `ci_karyawan`
  MODIFY `k_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
