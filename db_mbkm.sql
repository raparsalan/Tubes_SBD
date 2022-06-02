-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2022 pada 16.00
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
  `id_status` int(11) NOT NULL,
  `tanggal_ikut` date NOT NULL,
  `semester_ikut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_peserta`
--

INSERT INTO `daftar_peserta` (`id_daftar`, `id_mhs`, `id_program`, `sks_ditukar`, `id_status`, `tanggal_ikut`, `semester_ikut`) VALUES
(1, 6, 7, 20, 3, '2021-09-10', 5),
(2, 13, 5, 10, 2, '2022-05-10', 6),
(5, 36, 4, 10, 3, '2021-09-08', 7),
(14, 36, 5, 20, 3, '2022-06-17', 5),
(15, 36, 5, 20, 3, '2022-06-17', 5),
(16, 36, 5, 20, 3, '2022-06-17', 5),
(17, 36, 11, 20, 3, '2022-06-17', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `semester_sekarang` int(11) DEFAULT NULL,
  `ipk` float NOT NULL,
  `total_sks` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama_lengkap`, `jenis_kelamin`, `semester_sekarang`, `ipk`, `total_sks`, `id_user`) VALUES
(6, '2108061', 'Achmad Fauzan', 'Laki-Laki', 6, 3.86, 0, 7),
(7, '2105673', 'Alghaniyu Naufal Hamid', 'Laki-Laki', 6, 3.56, 0, 8),
(8, '2101147', 'Amida Zulfa Laila', 'Perempuan', 8, 3.88, 0, 9),
(9, '2101114', 'Anandita Kusumah Mulyadi', 'Perempuan', 6, 3.98, 0, 10),
(10, '2102671', 'Anderfa Jalu Kawani', 'Laki-Laki', 8, 3.45, 0, 11),
(11, '2102585', 'Apri Anggara Yudha', 'Laki-Laki', 8, 3.74, 0, 12),
(12, '2102268', 'Audry Leonardo Loo', 'Laki-Laki', 6, 3.86, 0, 13),
(13, '2100901', 'Azzahra Siti Hadjar', 'Perempuan', 6, 3.1, 0, 14),
(14, '2103727', 'Cantika Putri Arbiliansyah', 'Perempuan', 8, 3.66, 0, 15),
(15, '2100195', 'Davin Fausta Putra Sanjaya', 'Laki-Laki', 6, 3.68, 0, 16),
(16, '2105979', 'Farhan Muzhaffar Tiras Putra', 'Laki-Laki', 8, 3.25, 0, 17),
(17, '2103703', 'Fauziyyah Zayyan Nur', 'Perempuan', 6, 3.78, 0, 18),
(18, '2105927', 'Febry Syaman Hasan', 'Laki-Laki', 8, 3.85, 0, 19),
(19, '2102292', 'Harold Vidian Exaudi Simarmata', 'Laki-Laki', 8, 2.89, 0, 20),
(20, '2108077', 'Hestina Dwi Hartiwi', 'Perempuan', 6, 3.93, 0, 21),
(21, '2103507', 'Indah Resti Fauzi', 'Perempuan', 6, 4, 0, 22),
(22, '2102421', 'Kania Dinda Fasya', 'Perempuan', 8, 3.65, 0, 23),
(23, '2100991', 'Khana Yusdiana', 'Perempuan', 6, 3.27, 0, 24),
(24, '2108804', 'Laelatusyadiyah', 'Perempuan', 8, 3, 0, 25),
(25, '2102204', 'Mohamad Asyqari Anugrah', 'Laki-Laki', 8, 3.58, 0, 26),
(26, '2100137', 'Muhammad Nur Yasin Amadudin', 'Laki-Laki', 6, 3.89, 0, 27),
(27, '2102665', 'Muhammad Cahyana Bintang Fajar', 'Laki-Laki', 6, 3.88, 0, 28),
(28, '2108927', 'Muhammad Fahru Rozi', 'Laki-Laki', 8, 3.74, 0, 29),
(29, '2105997', 'Muhammad Fakhri Fadhlurrahman', 'Laki-Laki', 6, 3.64, 0, 30),
(30, '2100187', 'Muhammad Hilmy Rasyad Sofyan', 'Laki-Laki', 8, 2.65, 0, 31),
(31, '2102313', 'Muhammad Kamal Robbani', 'Laki-Laki', 8, 2.23, 0, 32),
(32, '2100192', 'Muhammad Rayhan Nur', 'Laki-Laki', 6, 3.45, 0, 33),
(33, '2102843', 'Najma Qalbi Dwiharani', 'Perempuan', 6, 3.64, 0, 34),
(34, '2105885', 'Qurroti Ainii', 'Perempuan', 8, 3.95, 0, 35),
(35, '2108938', 'Rafi Arsalan', 'Laki-Laki', 6, 3.86, 0, 36),
(36, '2100846', 'Rafly Putra Santoso', 'Laki-Laki', 8, 3, 0, 37),
(37, '2105745', 'Rodwan Albana', 'Laki-Laki', 8, 3.81, 0, 38),
(38, '2101103', 'Rifqi Fajar Indrayani', 'Laki-Laki', 6, 3.92, 0, 39),
(39, '2103662', 'Rigel Devano Hidayayutullah', 'Laki-Laki', 6, 2.98, 0, 40),
(40, '2106000', 'Sabila Rosad', 'Laki-Laki', 8, 3.85, 0, 41),
(41, '2108067', 'Villeneuve Sndhira Suwandhi', 'Laki-Laki', 6, 3.78, 0, 42),
(42, '2102159', 'Virza Raihan Kurniawan', 'Laki-Laki', 8, 3.15, 0, 43),
(43, '2103207', 'Yasmin Fathanah Zakiyyah', 'Perempuan', 8, 3.68, 0, 44),
(44, '2102545', 'Zahra Fitria Maharani', 'Perempuan', 6, 3.92, 0, 43);

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
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `keterangan`) VALUES
(1, 'Pendaftaran'),
(2, 'Sedang Berjalan'),
(3, 'Sudah Selesai'),
(4, 'Mengundurkan Diri / Tidak Selesai');

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
(6, 'admin', 'admin123', 1),
(7, '2108061', '2108061A', 0),
(8, '2105673', '2105673A', 0),
(9, '2101147', '2101147A', 0),
(10, '2101114', '2101114A', 0),
(11, '2102671', '2102671A', 0),
(12, '2102585', '2102585A', 0),
(13, '2102268', '2102268A', 0),
(14, '2100901', '2100901A', 0),
(15, '2103727', '2103727A', 0),
(16, '2100195', '2100195A', 0),
(17, '2105879', '2105879A', 0),
(18, '2103703', '2103703A', 0),
(19, '2105927', '2105927A', 0),
(20, '2102292', '2102292A', 0),
(21, '2108077', '2108077A', 0),
(22, '2103507', '2103507A', 0),
(23, '2102421', '2102421A', 0),
(24, '2100991', '2100991A', 0),
(25, '2108804', '2108804A', 0),
(26, '2102204', '2102204A', 0),
(27, '2100137', '2100137A', 0),
(28, '2102665', '2102665A', 0),
(29, '2108927', '2108927A', 0),
(30, '2105997', '2105997A', 0),
(31, '2100187', '2100187A', 0),
(32, '2102313', '2102313A', 0),
(33, '2100192', '2100192A', 0),
(34, '2102843', '2102843A', 0),
(35, '2105885', '2105885A', 0),
(36, '2108938', '2108938A', 0),
(37, '2100846', '2100846A', 0),
(38, '2105745', '2105745A', 0),
(39, '2101103', '2101103A', 0),
(40, '2003662', '2003662A', 0),
(41, '2106000', '2106000A', 0),
(42, '2108067', '2108067A', 0),
(43, '2102159', '2102159A', 0),
(44, '2103207', '2103207A', 0),
(45, '2102545', '2102545A', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_peserta`
--
ALTER TABLE `daftar_peserta`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_status` (`id_status`);

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
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

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
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_peserta`
--
ALTER TABLE `daftar_peserta`
  ADD CONSTRAINT `id_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_program` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
