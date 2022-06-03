-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2022 pada 20.37
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
(22, 6, 7, 20, 3, '2021-09-10', 5),
(23, 13, 5, 10, 2, '2022-05-10', 6),
(24, 15, 4, 10, 1, '2021-09-08', 7),
(25, 33, 5, 20, 1, '2022-06-11', 5),
(26, 3, 5, 20, 2, '2022-06-22', 5),
(27, 23, 5, 20, 3, '2022-06-23', 5),
(28, 26, 11, 20, 3, '2022-06-14', 5),
(29, 11, 1, 20, 2, '2021-09-27', 5),
(30, 11, 11, 20, 2, '2022-06-10', 6),
(31, 29, 2, 20, 4, '2021-09-12', 6),
(32, 38, 1, 20, 4, '2021-09-22', 6),
(33, 32, 10, 20, 1, '2021-09-21', 7),
(34, 12, 3, 20, 1, '2022-06-19', 5),
(35, 5, 4, 20, 2, '2022-06-20', 7),
(36, 7, 8, 20, 3, '2021-09-24', 6),
(37, 8, 6, 20, 3, '2022-06-23', 6),
(38, 1, 7, 20, 3, '2021-09-26', 5),
(39, 3, 4, 20, 2, '2021-09-11', 5),
(40, 9, 2, 20, 1, '2022-06-13', 7),
(41, 17, 2, 20, 2, '2021-09-16', 6),
(42, 19, 9, 20, 3, '2022-06-13', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `semester_sekarang` int(11) NOT NULL,
  `ipk` float NOT NULL,
  `total_sks` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama_lengkap`, `jenis_kelamin`, `semester_sekarang`, `ipk`, `total_sks`, `id_user`) VALUES
(1, '2108061', 'Achmad Fauzan', 'Laki-Laki', 6, 3.86, 0, 2),
(2, '2105673', 'Alghaniyu Naufal Hamid', 'Laki-Laki', 6, 3.56, 0, 3),
(3, '2101147', 'Amida Zulfa Laila', 'Perempuan', 8, 3.88, 0, 4),
(4, '2101114', 'Anandita Kusumah Mulyadi', 'Perempuan', 6, 3.98, 0, 5),
(5, '2102671', 'Anderfa Jalu Kawani', 'Laki-Laki', 8, 3.45, 0, 6),
(6, '2102585', 'Apri Anggara Yudha', 'Laki-Laki', 8, 3.74, 0, 7),
(7, '2102268', 'Audry Leonardo Loo', 'Laki-Laki', 6, 3.86, 0, 8),
(8, '2100901', 'Azzahra Siti Hadjar', 'Perempuan', 6, 3.1, 0, 9),
(9, '2103727', 'Cantika Putri Arbiliansyah', 'Perempuan', 8, 3.66, 0, 10),
(10, '2100195', 'Davin Fausta Putra Sanjaya', 'Laki-Laki', 6, 3.68, 0, 11),
(11, '2105979', 'Farhan Muzhaffar Tiras Putra', 'Laki-Laki', 8, 3.25, 0, 12),
(12, '2103703', 'Fauziyyah Zayyan Nur', 'Perempuan', 6, 3.78, 0, 13),
(13, '2105927', 'Febry Syaman Hasan', 'Laki-Laki', 8, 3.85, 0, 14),
(14, '2102292', 'Harold Vidian Exaudi Simarmata', 'Laki-Laki', 8, 2.89, 0, 15),
(15, '2108077', 'Hestina Dwi Hartiwi', 'Perempuan', 6, 3.93, 0, 16),
(16, '2103507', 'Indah Resti Fauzi', 'Perempuan', 6, 4, 0, 17),
(17, '2102421', 'Kania Dinda Fasya', 'Perempuan', 8, 3.65, 0, 18),
(18, '2100991', 'Khana Yusdiana', 'Perempuan', 6, 3.27, 0, 19),
(19, '2108804', 'Laelatusyadiyah', 'Perempuan', 8, 3, 0, 20),
(20, '2102204', 'Mohamad Asyqari Anugrah', 'Laki-Laki', 8, 3.58, 0, 21),
(21, '2100137', 'Muhammad Nur Yasin Amadudin', 'Laki-Laki', 6, 3.89, 0, 22),
(22, '2102665', 'Muhammad Cahyana Bintang Fajar', 'Laki-Laki', 6, 3.88, 0, 23),
(23, '2108927', 'Muhammad Fahru Rozi', 'Laki-Laki', 8, 3.74, 0, 24),
(24, '2105997', 'Muhammad Fakhri Fadhlurrahman', 'Laki-Laki', 6, 3.64, 0, 25),
(25, '2100187', 'Muhammad Hilmy Rasyad Sofyan', 'Laki-Laki', 8, 2.65, 0, 26),
(26, '2102313', 'Muhammad Kamal Robbani', 'Laki-Laki', 8, 2.23, 0, 27),
(27, '2100192', 'Muhammad Rayhan Nur', 'Laki-Laki', 6, 3.45, 0, 28),
(28, '2102843', 'Najma Qalbi Dwiharani', 'Perempuan', 6, 3.64, 0, 29),
(29, '2105885', 'Qurroti Ainii', 'Perempuan', 8, 3.95, 0, 30),
(30, '2108938', 'Rafi Arsalan', 'Laki-Laki', 6, 3.86, 0, 31),
(31, '2100846', 'Rafly Putra Santoso', 'Laki-Laki', 8, 3, 0, 32),
(32, '2105745', 'Rodwan Albana', 'Laki-Laki', 8, 3.81, 0, 33),
(33, '2101103', 'Rifqi Fajar Indrayani', 'Laki-Laki', 6, 3.92, 0, 34),
(34, '2106000', 'Sabila Rosad', 'Laki-Laki', 8, 3.85, 0, 35),
(35, '2108067', 'Villeneuve Sndhira Suwandhi', 'Laki-Laki', 6, 3.78, 0, 36),
(36, '2102159', 'Virza Raihan Kurniawan', 'Laki-Laki', 8, 3.15, 0, 37),
(37, '2103207', 'Yasmin Fathanah Zakiyyah', 'Perempuan', 8, 3.68, 0, 38),
(38, '2102545', 'Zahra Fitria Maharani', 'Perempuan', 6, 3.92, 0, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `authority`) VALUES
(1, 'admin', 'admin123', 1),
(2, '2108061', '2108061A', 0),
(3, '2105673', '2105673A', 0),
(4, '2101147', '2101147A', 0),
(5, '2101114', '2101114A', 0),
(6, '2102671', '2102671A', 0),
(7, '2102585', '2102585A', 0),
(8, '2102268', '2102268A', 0),
(9, '2100901', '2100901A', 0),
(10, '2103727', '2103727A', 0),
(11, '2100195', '2100195A', 0),
(12, '2105879', '2105879A', 0),
(13, '2103703', '2103703A', 0),
(14, '2105927', '2105927A', 0),
(15, '2102292', '2102292A', 0),
(16, '2108077', '2108077A', 0),
(17, '2103507', '2103507A', 0),
(18, '2102421', '2102421A', 0),
(19, '2100991', '2100991A', 0),
(20, '2108804', '2108804A', 0),
(21, '2102204', '2102204A', 0),
(22, '2100137', '2100137A', 0),
(23, '2102665', '2102665A', 0),
(24, '2108927', '2108927A', 0),
(25, '2105997', '2105997A', 0),
(26, '2100187', '2100187A', 0),
(27, '2102313', '2102313A', 0),
(28, '2100192', '2100192A', 0),
(29, '2102843', '2102843A', 0),
(30, '2105885', '2105885A', 0),
(31, '2108938', '2108938A', 0),
(32, '2100846', '2100846A', 0),
(33, '2105745', '2105745A', 0),
(34, '2101103', '2101103A', 0),
(35, '2106000', '2106000A', 0),
(36, '2108067', '2108067A', 0),
(37, '2102159', '2102159A', 0),
(38, '2103207', '2103207A', 0),
(39, '2102545', '2102545A', 0);

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
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_peserta`
--
ALTER TABLE `daftar_peserta`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_peserta`
--
ALTER TABLE `daftar_peserta`
  ADD CONSTRAINT `daftar_peserta_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`),
  ADD CONSTRAINT `daftar_peserta_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`),
  ADD CONSTRAINT `daftar_peserta_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
