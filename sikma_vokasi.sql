-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2021 pada 08.15
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikma_vokasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_lomba`
--

CREATE TABLE `info_lomba` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_lomba`
--

INSERT INTO `info_lomba` (`id`, `judul`, `foto`, `isi`) VALUES
(1, 'Lomba Cipta Karya Bahasa', 'laptop.jpg', '<p>Lomba Cipta Karya Bahasa merupakan sebuah lomba antar mahasiswa dalam bentuk karya sastra seperti puisi, cerpen dll</p>'),
(5, 'Lomba LKS ', 'Couter_up-down_seven_segmen.jpg', '<p>Lomba Ketrampilan Siswa</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kewirausahaan`
--

CREATE TABLE `kewirausahaan` (
  `id_kwu` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `departemen` varchar(128) NOT NULL,
  `program_studi` varchar(128) NOT NULL,
  `nama_usaha` varchar(128) NOT NULL,
  `jenis_usaha` varchar(128) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `id_prodi` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kewirausahaan`
--

INSERT INTO `kewirausahaan` (`id_kwu`, `nama`, `nim`, `departemen`, `program_studi`, `nama_usaha`, `jenis_usaha`, `bukti`, `id_prodi`) VALUES
(1, 'Muhammad Edi Ilfa', '21120118120025', '-', 'D3-Akuntansi', 'Tenun Ikat', 'Niaga', 'logo_new_putih.jpeg', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `listprodi`
--

CREATE TABLE `listprodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `listprodi`
--

INSERT INTO `listprodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'D4-Rekayasa Perancangan Mekanik'),
(2, 'D4-Teknologi Rekayasa Kimia Industri'),
(3, 'D4-Teknologi Rekayasa Otomasi'),
(4, 'D4-Teknologi Rekayasa Konstruksi Perkapalan'),
(5, 'D4-Teknik Infrastruktur Sipil Dan Perancangan'),
(6, 'D4-Perencanaan Tata Ruang Dan Pertanahan'),
(7, 'D4-Teknik Listrik Industri'),
(8, 'D4-Manajemen Dan Administrasi'),
(9, 'D4-Informasi Dan Hubungan Masyarakat'),
(10, 'D4-Akuntansi Perpajakan'),
(11, 'D4-Bahasa Asing Terapan'),
(12, 'D3-Teknologi Perencanaan Wilayah dan Kota'),
(13, 'D3-Hubungan Masyarakat'),
(14, 'D3-Akuntansi'),
(15, 'D3-Manajemen Perusahaan'),
(16, 'D3-Administrasi Pajak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_lomba`
--

CREATE TABLE `pengajuan_lomba` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `departemen` varchar(128) DEFAULT NULL,
  `program_studi` varchar(128) DEFAULT NULL,
  `semester` varchar(128) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `nama_lomba` varchar(255) DEFAULT NULL,
  `penyelenggara` varchar(255) DEFAULT NULL,
  `tingkat` varchar(25) DEFAULT NULL,
  `tgl_mulai_lomba` date DEFAULT NULL,
  `tgl_selesai_lomba` date DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `status_prodi` int(2) NOT NULL DEFAULT '0',
  `status_wd1` int(2) NOT NULL DEFAULT '0',
  `status_tu` int(2) NOT NULL DEFAULT '0',
  `id_prodi` int(128) DEFAULT NULL,
  `ket_tolak_prodi` varchar(1024) NOT NULL,
  `ket_tolak_wd1` varchar(1024) NOT NULL,
  `ket_tolak_tu` varchar(128) NOT NULL,
  `no_surat` text,
  `tgl_surat` varchar(25) DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_lomba`
--

INSERT INTO `pengajuan_lomba` (`id`, `nama`, `nim`, `departemen`, `program_studi`, `semester`, `alamat`, `no_hp`, `nama_lomba`, `penyelenggara`, `tingkat`, `tgl_mulai_lomba`, `tgl_selesai_lomba`, `tahun`, `upload`, `status_prodi`, `status_wd1`, `status_tu`, `id_prodi`, `ket_tolak_prodi`, `ket_tolak_wd1`, `ket_tolak_tu`, `no_surat`, `tgl_surat`, `tgl_buat`, `bukti`) VALUES
(29, 'Muhammad Edi', '21120118120025', '-', 'D3-Akuntansi', '5', 'Kudus', '0854372928745', 'CCNA', 'CISCO', 'Internasional', '2020-12-01', '2020-12-12', '2020', '10229-Article_Text-1641-1-10-20191002.pdf', 3, 3, 3, 14, '', '', '', '001/UN7.5.13/KU/2021', '25 Januari 2021', '2021-01-25', ''),
(31, 'Lina Aulia', '21120118120019', '-', 'D3-Hubungan Masyarakat', '6', 'Jalan Prof. Soedarto, SH', '11111111111111', 'Lomba Karya Tulis Ilmiah', 'Universitas Brawijaya', 'Nasional', '2021-01-22', '2021-01-29', '2021', 'Maulana_Ilham_Mudhin_Ghozali_21120118120018_UAS_ROBOTIKA1.pdf', 3, 3, 0, 13, '', '', '', NULL, NULL, NULL, ''),
(32, 'Dwi Nurfatma', '21120118120013', '-', 'D3-Hubungan Masyarakat', '5', 'Jalan Prof. Soedarto, SH', '0854372928745', 'Malaysia Expo', 'Malaysia', 'Internasional', '2021-02-12', '2021-02-15', '2021', 'Maulana_Ilham_Mudhin_Ghozali_21120118120018_UAS_ROBOTIKA2.pdf', 3, 0, 0, 13, '', '', '', NULL, NULL, NULL, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `departemen` varchar(128) DEFAULT NULL,
  `program_studi` varchar(128) DEFAULT NULL,
  `semester` varchar(128) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `nama_lomba` varchar(255) DEFAULT NULL,
  `penyelenggara` varchar(255) DEFAULT NULL,
  `tingkat` varchar(25) DEFAULT NULL,
  `tgl_mulai_lomba` date DEFAULT NULL,
  `tgl_selesai_lomba` date DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `id_prodi` int(128) DEFAULT NULL,
  `juara` varchar(128) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama`, `nim`, `departemen`, `program_studi`, `semester`, `alamat`, `no_hp`, `nama_lomba`, `penyelenggara`, `tingkat`, `tgl_mulai_lomba`, `tgl_selesai_lomba`, `tahun`, `id_prodi`, `juara`, `bukti`) VALUES
(30, 'Muhammad Edi', '21120118120025', '-', 'D3-Akuntansi', '5', 'Jalan Prof. Soedarto, SH', '089560373211', 'Cipta Karya Bahasa', 'Undip', 'Nasional', '2020-12-23', '2020-12-23', '2020', 14, '1', 'ip_samba_server.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `nim` varchar(25) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `id_prodi` int(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `nim`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `id_prodi`) VALUES
(7, 'Admin', NULL, 'admin@gmail.com', 'profil20.jpg', '$2y$10$QEXdub0P6nQ9XsZWg44N5.Rxz69poStE3c6kxTc4Eah.MThIi.Mee', 1, 1, 1596001190, NULL),
(27, 'Wakil Dekan 1', NULL, 'wadek@gmail.com', 'profil2.jpg', '$2y$10$8Ct5sCjE9U6EznWnDVT03eHUFl4AyGfjD4poG4hpgpxTdFYTz19Dy', 5, 1, 1599301078, NULL),
(28, 'Kepala Tata Usaha', NULL, 'tatausaha@gmail.com', 'profil3.jpg', '$2y$10$1SQq0Y8IIFYcsWM90hoUgOtWP0Tg1TwCUBTfQeJDZtl93cmt9pygi', 6, 1, 1599301316, NULL),
(29, 'D4-Rekayasa Perancangan Mekanik', NULL, 'kaprodi1@gmail.com', 'profil4.jpg', '$2y$10$76gufq0/Z.IRr78PtzTPRe/rfXK.1P9A76o2AB2iBOiJxR7T.Z7Oq', 4, 1, 1599301442, 1),
(30, 'D4-Teknologi Rekayasa Kimia Industri', NULL, 'kaprodi2@gmail.com', 'profil5.jpg', '$2y$10$dEPc7z.I103Ie2IUl5sZ9e0XIKS579eyOQwzyfqwT2YJfvIeXztW6', 4, 1, 1599301502, 2),
(31, 'D4-Teknologi Rekayasa Otomasi', NULL, 'kaprodi3@gmail.com', 'profil6.jpg', '$2y$10$UBSjBoqqLf5CfvY5H12HJe4Rgkm2Xc7KZWTh8.HXEB.WPei1hyQm6', 4, 1, 1599301553, 3),
(32, 'D4-Teknologi Rekayasa Konstruksi Perkapalan', NULL, 'kaprodi4@gmail.com', 'profil7.jpg', '$2y$10$PG.qWrgCeAJ0vP21Bs/8KOdeB0IkeqzI5DsBu5HM.mf/L3CIHmgtC', 4, 1, 1599301609, 4),
(33, 'D4-Teknik Infrastruktur Sipil Dan Perancangan', NULL, 'kaprodi5@gmail.com', 'profil8.jpg', '$2y$10$tFHwHbHJnI572QYYFL1/n.n2kM1KeZpzzBp4lhxt4mIWov4r6/3tG', 4, 1, 1599301685, 5),
(34, 'D4-Perencanaan Tata Ruang Dan Pertanahan', NULL, 'kaprodi6@gmail.com', 'profil9.jpg', '$2y$10$qga9zHAflRxNOr1q/V..GuIplTH8aYtt7VoAqcCwW5a0G1JRcutKq', 4, 1, 1599301740, 6),
(35, 'D4-Teknik Listrik Industri', NULL, 'kaprodi7@gmail.com', 'profil10.jpg', '$2y$10$OoDSnb5TKokXXYaxF48iveJgsSE79zxnt63U7561WaqyWLCgh9kJe', 4, 1, 1599301793, 7),
(36, 'D4-Manajemen Dan Administrasi', NULL, 'kaprodi8@gmail.com', 'profil11.jpg', '$2y$10$07iTHqT/UVCqz./EaRi8y.XXQsdbgC1OkDrEL.PFSbxZ4jN.buaGq', 4, 1, 1599301855, 8),
(37, 'D4-Informasi Dan Hubungan Masyarakat', NULL, 'kaprodi9@gmail.com', 'profil12.jpg', '$2y$10$S6JHsBH2oZyX/kf5nJFFeOHTAoI3KdxWqkyLIuapjXO0pENDAjwtW', 4, 1, 1599301906, 9),
(38, 'D4-Akuntansi Perpajakan', NULL, 'kaprodi10@gmail.com', 'profil13.jpg', '$2y$10$CNaZIj8uWRep9o1Ss8Dk4.4QABYoXx/dNJayvfqdF.Kh4GE2p.vGm', 4, 1, 1599301956, 10),
(39, 'D4-Bahasa Asing Terapan', NULL, 'kaprodi11@gmail.com', 'profil14.jpg', '$2y$10$S7/k3x7CnqA.AMbrHK1Aze13oFyl4fc2beHxY7guF8jvXmzdlGTTi', 4, 1, 1599302011, 11),
(40, 'D3-Teknologi Perencanaan Wilayah Dan Kota', NULL, 'kaprodi12@gmail.com', 'profil15.jpg', '$2y$10$6OsDdr.GaoT//n/ILu9Ule3jWNkvBpysafXH06BOhCPnbvKZ2DFCm', 4, 1, 1599302072, 12),
(41, 'D3-Hubungan Masyarakat', NULL, 'kaprodi13@gmail.com', 'profil16.jpg', '$2y$10$7mNwLecF44DcSkRuMqlFhekr9DFxx4bn1hgNBu1iVQgibSf9z8HpS', 4, 1, 1599302119, 13),
(42, 'D3-Akuntansi', NULL, 'kaprodi14@gmail.com', 'profil17.jpg', '$2y$10$7QNi8el2BunK.qhY4Hc9f.1GyKzbkIAaU2iWhA8R1q9I7.oyGRwo6', 4, 1, 1599302163, 14),
(43, 'D3-Manajemen Perusahaan', NULL, 'kaprodi15@gmail.com', 'profil18.jpg', '$2y$10$mM5uwlrPQdweApOpnxc70.51npxP5jQu9mCcti608Zk5ru3G9eyBu', 4, 1, 1599302209, 15),
(44, 'D3-Administrasi Pajak', NULL, 'kaprodi16@gmail.com', 'profil19.jpg', '$2y$10$fR4N0SCZhbX8FIQHL315PeghTDkREhRqIS8xjV8wQLc3.Vd6dkIi6', 4, 1, 1599302263, 16),
(47, 'Muhammad Edi', '21120118120025', 'edi@gmail.com   ', 'profil24.jpg', '$2y$10$d5Ln80XilQ26IFsBfDXunuKtrlsbwpWOqrD7KvWKGia0Sbz9DxhgO', 2, 1, 1600220296, NULL),
(51, 'Lina Aulia', '21120118120019', 'lina@gmail.com', 'profil22.jpg', '$2y$10$9hD6npSKRSSxVCgrN5jT8OYVlw4WDhqWinNWAAnwJlWej/P6CbHl.', 2, 1, 1608719329, NULL),
(52, 'Dwi Nurfatma', '21120118120013', 'fatma@gmail.com', 'profil23.jpg', '$2y$10$BYFq9Xr0AKlXj2b4n7x2QeZnQBQ5/yf93ugqCj.PYE0dVVq7OJaOG', 2, 1, 1609734184, NULL),
(53, 'Dekan', '', 'dekan@gmail.com', 'profil.jpg', '$2y$10$QByNL2W0Rj7VQ60gcVCCZOAcKXiTfjh6LD.o1fh.N9ZlQ.7ptQK7K', 7, 1, 1610893308, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(6, 3, 4),
(7, 4, 5),
(8, 5, 6),
(9, 6, 7),
(14, 7, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Kaprodi'),
(6, 'Wadek'),
(7, 'Tatausaha'),
(8, 'Dekan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(4, 'Kepala Prodi'),
(5, 'Wakil Dekan I'),
(6, 'Tata Usaha'),
(7, 'Dekan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard Admin', 'admin', 'fas fa-fw fa-home', 1),
(2, 2, 'Dashboard User', 'user', 'fas fa-fw fa-users', 1),
(5, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder-plus', 1),
(6, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-plus', 1),
(11, 2, 'Prestasi Mahasiswa', 'user/prestasi', 'fas fa-fw fa-user-graduate', 1),
(12, 2, 'Kewirausahaan Mahasiswa', 'user/kewirausahaan', 'fas fa-fw fa-coins', 1),
(15, 4, 'Dashboard Keuangan', 'keuangan', 'fas fa-fw fa-home', 1),
(18, 5, 'Dashboard Kaprodi', 'kaprodi', 'fas fa-fw fa-home', 1),
(20, 6, 'Dashboard WD 1', 'wadek', 'fas fa-fw fa-home', 1),
(22, 7, 'Dashboard TU', 'tatausaha', 'fas fa-fw fa-home', 1),
(25, 5, 'Data Pengajuan Lomba', 'kaprodi/data_pengajuan_lomba', 'fas fa-fw fa-book', 1),
(27, 2, 'Pengajuan Lomba', 'user/pengajuanlomba', 'fas fa-fw fa-paper-plane', 1),
(28, 2, 'Status', 'user/status', 'fas fa-fw fa-info', 1),
(29, 5, 'Status', 'kaprodi/status', 'fas fa-fw fa-info', 1),
(30, 6, 'Data Pengajuan Lomba', 'wadek/data_pengajuan_lomba', 'fas fa-fw fa-book', 1),
(31, 6, 'Status', 'wadek/status', 'fas fa-fw fa-info', 1),
(32, 7, 'Data Pengajuan Lomba', 'tatausaha/data_pengajuan_lomba', 'fas fa-fw fa-book', 1),
(33, 7, 'Status', 'tatausaha/status', 'fas fa-fw fa-info', 1),
(35, 5, 'Prestasi Mahasiswa', 'kaprodi/prestasi', 'fas fa-fw fa-user-graduate', 1),
(36, 5, 'Kewirausahaan Mahasiswa', 'kaprodi/kewirausahaan', 'fas fa-fw fa-coins', 1),
(38, 8, 'Dashboard Dekan', 'dekan/index', 'fas fa-fw fa-home', 1),
(40, 6, 'Prestasi Mahasiswa', 'wadek/prestasi', 'fas fa-fw fa-user-graduate', 1),
(41, 6, 'Kewirausahaan Mahasiswa', 'wadek/kewirausahaan', 'fas fa-fw fa-coins', 1),
(42, 7, 'Prestasi Mahasiswa', 'tatausaha/prestasi', 'fas fa-fw fa-user-graduate', 1),
(43, 7, 'Kewirausahaan Mahasiswa', 'tatausaha/kewirausahaan', 'fas fa-fw fa-coins', 1),
(44, 8, 'Prestasi Mahasiswa', 'dekan/prestasi', 'fas fa-fw fa-user-graduate', 1),
(45, 8, 'Kewirausahaan Mahasiswa', 'dekan/kewirausahaan', 'fas fa-fw fa-coins', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `info_lomba`
--
ALTER TABLE `info_lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kewirausahaan`
--
ALTER TABLE `kewirausahaan`
  ADD PRIMARY KEY (`id_kwu`);

--
-- Indeks untuk tabel `listprodi`
--
ALTER TABLE `listprodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `pengajuan_lomba`
--
ALTER TABLE `pengajuan_lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `info_lomba`
--
ALTER TABLE `info_lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kewirausahaan`
--
ALTER TABLE `kewirausahaan`
  MODIFY `id_kwu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `listprodi`
--
ALTER TABLE `listprodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_lomba`
--
ALTER TABLE `pengajuan_lomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
