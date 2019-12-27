-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2019 pada 03.51
-- Versi server: 10.1.21-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aantampan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoicedate` date NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sianu` int(11) NOT NULL,
  `harga` varchar(90) NOT NULL,
  `status` int(11) NOT NULL,
  `status_konfirmasi` int(11) DEFAULT NULL,
  `urlbukti` text,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `invoicedate`, `no_invoice`, `id_user`, `id_sianu`, `harga`, `status`, `status_konfirmasi`, `urlbukti`, `id_post`) VALUES
(7, '2019-12-21', '20191221110', 16, 15, '10000000', 1, 1, './assets/img/upload/invoice/budisetiawan_invoice_201912211101.png', 11),
(8, '2019-12-21', '20191221111', 16, 15, '10000000', 1, 1, './assets/img/upload/invoice/budisetiawan_invoice_20191221111.png', 11),
(9, '2019-12-25', '20191225102', 16, 15, '10000000', 1, 1, './assets/img/upload/invoice/budisetiawan_invoice_20191225102.png', 10),
(10, '2019-12-21', '20191226113', 16, 15, '10000000', 0, 1, './assets/img/upload/invoice/budisetiawan_invoice_201912211101.png', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `janjitemu`
--

CREATE TABLE `janjitemu` (
  `id_janji` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` text NOT NULL,
  `sianu_id` int(11) NOT NULL,
  `statusjanji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `janjitemu`
--

INSERT INTO `janjitemu` (`id_janji`, `user_id`, `tanggal`, `waktu`, `tempat`, `sianu_id`, `statusjanji`) VALUES
(1, 1, '2019-12-13', '12:00:00', 'Palembang', 12, 0),
(2, 1, '2019-12-14', '12:00:00', 'mbuh', 12, 0),
(3, 1, '2019-12-13', '08:00:00', 'Griya Bangun Asri', 12, 0),
(4, 13, '2019-12-14', '08:00:00', 'Griya Bangun Asri', 12, 0),
(5, 13, '2019-12-15', '08:00:00', 'Griya Bangun Asri', 12, 0),
(6, 15, '2019-12-17', '08:00:00', 'Griya Bangun Asri', 14, 0),
(7, 13, '2019-12-17', '08:30:00', 'Griya Bangun Asri', 14, 0),
(8, 1, '2019-12-17', '08:00:00', 'Griya Bangun Asri', 15, 0),
(9, 1, '2019-12-17', '17:00:00', 'Griya Bangun Asri', 13, 0),
(10, 15, '2019-12-18', '08:00:00', 'Griya Bangun Asri', 13, 0),
(11, 16, '2019-12-21', '08:30:00', 'Griya Bangun Asri', 15, 2),
(12, 16, '2019-12-21', '09:00:00', 'Griya Bangun Asri', 15, 2),
(13, 16, '2019-12-23', '09:00:00', 'Griya Bangun Asri', 15, 2),
(14, 16, '2019-12-23', '08:30:00', 'asdasd', 15, 2),
(15, 16, '2019-12-23', '12:00:00', 'Griya Bangun Asri', 15, 2),
(16, 16, '2019-12-24', '09:30:00', 'Griya Bangun Asri', 15, 2),
(17, 16, '2019-12-23', '08:00:00', 'Griya Bangun Asri', 15, 2),
(18, 16, '2019-12-23', '08:00:00', 'Griya Bangun Asri', 15, 0),
(19, 16, '2019-12-25', '08:00:00', 'Griya Bangun Asri', 15, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id_port` int(11) NOT NULL,
  `url` text NOT NULL,
  `title` varchar(80) NOT NULL,
  `img_url` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL,
  `panjang` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `lb` int(11) DEFAULT NULL,
  `kt` int(11) DEFAULT NULL,
  `km` int(11) DEFAULT NULL,
  `ktm` int(11) DEFAULT NULL,
  `garasi` int(11) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `status_moderasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `portofolio`
--

INSERT INTO `portofolio` (`id_port`, `url`, `title`, `img_url`, `user_id`, `related_id`, `panjang`, `lebar`, `lb`, `kt`, `km`, `ktm`, `garasi`, `harga`, `status_moderasi`) VALUES
(10, 'http://localhost/aantampan/home/post/QXJzaXRla3R1ci1FdXJvcGVhbi0xNQ', 'Arsitektur European', './assets/img/upload/anugrahsakti_portofolio_0.png', 15, 14, 1, 1, 1, 1, 1, 1, 1, 10000000, 1),
(11, 'http://localhost/aantampan/home/post/QXJzaXRla3R1ci1Bc2lhbi0xNQ--', 'Arsitektur Asian', './assets/img/upload/anugrahsakti_portofolio_1.png', 15, 12, 1, 1, 1, 1, 1, 1, 1, 10000000, 1),
(12, 'http://localhost/aantampan/home/post/VGVzdGluZy1Nb2RlcmFzaS0xNQ--', 'Testing Moderasi', './assets/img/upload/anugrahsakti_portofolio_2.png', 15, 14, 1, 1, 1, 1, 1, 1, 1, 100000000, 0),
(13, 'http://localhost/aantampan/home/post/VGVzdC1UdWthbmctUG9ydG9mb2xpby0xNA--', 'Test Tukang Portofolio', './assets/img/upload/aditya_portofolio_0.png', 14, 13, 1, 1, 1, 1, 1, 1, 1, 10000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(1, '15b69ba9eb69ae6b0a34d05e9d9e7c', 12, '2019-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `photopath` text,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `birthplace` varchar(40) DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(20) DEFAULT NULL,
  `tim` int(11) DEFAULT NULL,
  `tgldaftar` date NOT NULL,
  `email` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `logged_in` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `photopath`, `fname`, `lname`, `birthdate`, `birthplace`, `alamat`, `nohp`, `tim`, `tgldaftar`, `email`, `username`, `password`, `logged_in`, `level`) VALUES
(1, './assets/img/upload/admin.png', 'Abdul', 'Halim', '1996-09-28', 'Palembang', 'Palembang, Palembang, Palembang,', '082181033650', NULL, '0000-00-00', 'abdulhalum1234@icloud.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(12, NULL, 'anugrah', 'sakti tampan', '2019-08-25', 'palembang', 'palembang', '082181033012', NULL, '2019-12-10', 'anu@anu.com', 'anu', '13776db80d4561e5747d5bae93b18d6d', 0, 3),
(13, './assets/img/upload/badak.png', 'Badak', 'Cula Empat', '2019-12-01', 'Kebun', 'Kebun binatang ragunan mbuh dimana', '080808080808', NULL, '2019-12-14', 'badak@cula.com', 'badak', 'e4488a0398501a35f910c10341b476c0', 0, 2),
(14, './assets/img/upload/aditya.png', 'Adit', 'Sakti', '2019-12-01', 'rumah sakit', 'Jalan kemana mana, tapi hati tetap sepi, kasian banget dah', '0808080234234', NULL, '2019-12-14', 'aditya@gmail.com', 'aditya', 'c278dddfac37a089c24400983816a6a9', 0, 3),
(15, './assets/img/upload/anugrahsakti.jpg', 'anugrah', 'sakti', '2012-12-12', 'Muara Enim', 'Muara enim, daktau tapi dimanonyo. jauh dari palembang', '081212121212', NULL, '2019-12-14', 'anugrahsakti05@gmail.com', 'anugrahsakti', 'd3ccb844ac68bc324e6c95e94c05e477', 0, 2),
(16, './assets/img/upload/budisetiawan.png', 'Budi', 'Setiawan', '1996-12-12', 'Binomo', 'Russia', '080808080808', NULL, '2019-12-19', 'budisetiawan@binomo.com', 'budisetiawan', 'b110d5fabe2efdf003e47422b3f8d218', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_sianu`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_sianu` (`id_sianu`);

--
-- Indeks untuk tabel `janjitemu`
--
ALTER TABLE `janjitemu`
  ADD PRIMARY KEY (`id_janji`),
  ADD KEY `user_id` (`user_id`,`sianu_id`),
  ADD KEY `sianu_id` (`sianu_id`);

--
-- Indeks untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id_port`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `related_id` (`related_id`);

--
-- Indeks untuk tabel `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `janjitemu`
--
ALTER TABLE `janjitemu`
  MODIFY `id_janji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id_port` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_sianu`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`id_post`) REFERENCES `portofolio` (`id_port`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `janjitemu`
--
ALTER TABLE `janjitemu`
  ADD CONSTRAINT `janjitemu_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `janjitemu_ibfk_2` FOREIGN KEY (`sianu_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `portofolio_ibfk_2` FOREIGN KEY (`related_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `reset_password` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
