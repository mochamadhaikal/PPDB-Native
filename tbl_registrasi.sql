-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2022 pada 08.46
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_registrasi`
--

CREATE TABLE `tbl_registrasi` (
  `NoDaftar` int(11) NOT NULL,
  `NamaLengkap` varchar(100) NOT NULL,
  `JK` varchar(11) NOT NULL,
  `AlamatLengkap` varchar(255) NOT NULL,
  `Agama` varchar(11) NOT NULL,
  `AsalSMP` varchar(100) NOT NULL,
  `Jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_registrasi`
--

INSERT INTO `tbl_registrasi` (`NoDaftar`, `NamaLengkap`, `JK`, `AlamatLengkap`, `Agama`, `AsalSMP`, `Jurusan`) VALUES
(1, 'Haikal', 'Laki-laki', 'peundeuy', 'Islam', 'SMP RJ', 'RPL'),
(5, 'Fadhil', 'Laki-laki', 'kp cisarua', 'Hindu', 'Nesaci', 'RPL'),
(6, 'Fema', 'Perempuan', 'kp cimande', 'Hindu', 'Nesaci', 'RPL');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
  ADD PRIMARY KEY (`NoDaftar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
  MODIFY `NoDaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
