-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2022 pada 09.17
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mbkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_peserta`
--

CREATE TABLE `daftar_peserta` (
  `id_daftar` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `sks_ditukar` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_peserta`
--

INSERT INTO `daftar_peserta` (`id_daftar`, `id_mhs`, `id_program`, `sks_ditukar`, `status`) VALUES
(1, 1, 7, 20, 'Pendaftaran'),
(2, 5, 8, 20, 'Pendaftaran'),
(3, 2, 8, 40, 'Lolos'),
(4, 3, 7, 20, 'Mengundurkan Diri / Gagal'),
(5, 4, 7, 20, 'Pendaftaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama_lengkap`, `semester`, `id_user`) VALUES
(1, '2108938', 'Rafi Arsalan ', 2, 1),
(2, '2100195', 'Davin Fausta', 6, 2),
(3, '2105879', 'Farhan', 4, 3),
(4, '2103703', 'Fauziah Zayyan', 5, 4),
(5, '2103507', 'Indah Resti Fauzi', 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id_program`, `nama_program`) VALUES
(1, 'Kampus Mengajar'),
(2, 'Magang / Praktik Kerja'),
(3, 'Membangun Desa'),
(4, 'Pertukaran Mahasiswa Merdeka'),
(5, 'Riset atau Penelitian'),
(6, 'Studi Independen'),
(7, 'Bangkit by Google, Goto, dan Traveloka'),
(8, 'Indonesian International Student Mobility Awards'),
(9, 'Kementrian ESDM - GERILYA'),
(10, 'Pejuang Muda Kampus Merdeka'),
(11, 'Proyek Kemanusiaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `authority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `authority`) VALUES
(1, '218938', '12345', 0),
(2, '2100195', 'abcde', 0),
(3, '2105879', 'fghij', 0),
(4, '2103703', 'klmno', 0),
(5, '2103507', 'indahjele', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_peserta`
--
ALTER TABLE `daftar_peserta`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `id_program` (`id_program`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_peserta`
--
ALTER TABLE `daftar_peserta`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_peserta`
--
ALTER TABLE `daftar_peserta`
  ADD CONSTRAINT `id_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`),
  ADD CONSTRAINT `id_program` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
