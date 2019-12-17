-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2019 pada 14.23
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
-- Struktur dari tabel `janjitemu`
--

CREATE TABLE `janjitemu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` text NOT NULL,
  `sianu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `janjitemu`
--

INSERT INTO `janjitemu` (`id`, `user_id`, `tanggal`, `waktu`, `tempat`, `sianu_id`) VALUES
(1, 1, '2019-12-13', '12:00:00', 'Palembang', 12),
(2, 1, '2019-12-14', '12:00:00', 'mbuh', 12),
(3, 1, '2019-12-13', '08:00:00', 'Griya Bangun Asri', 12),
(4, 13, '2019-12-14', '08:00:00', 'Griya Bangun Asri', 12),
(5, 13, '2019-12-15', '08:00:00', 'Griya Bangun Asri', 12),
(6, 15, '2019-12-17', '08:00:00', 'Griya Bangun Asri', 14),
(7, 13, '2019-12-17', '08:30:00', 'Griya Bangun Asri', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `title` varchar(80) NOT NULL,
  `category` varchar(40) NOT NULL,
  `contents` text NOT NULL,
  `img_url` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, NULL, 'anugrah', 'sakti tampan', '2019-08-25', 'palembang', 'palembang', '082181033012', NULL, '2019-12-10', 'anu@anu.com', 'anu', '13776db80d4561e5747d5bae93b18d6d', 0, 2),
(13, './assets/img/upload/badak.png', 'Badak', 'Cula Empat', '2019-12-01', 'Kebun', 'Kebun binatang ragunan mbuh dimana', '080808080808', NULL, '2019-12-14', 'badak@cula.com', 'badak', 'e4488a0398501a35f910c10341b476c0', 0, 2),
(14, './assets/img/upload/aditya.png', 'Adit', 'Sakti', '2019-12-01', 'rumah sakit', 'Jalan kemana mana, tapi hati tetap sepi, kasian banget dah', '0808080234234', NULL, '2019-12-14', 'aditya@gmail.com', 'aditya', 'c278dddfac37a089c24400983816a6a9', 0, 2),
(15, './assets/img/upload/anugrahsakti.jpg', 'anugrah', 'sakti', '2012-12-12', 'Muara Enim', 'Muara enim, daktau tapi dimanonyo. jauh dari palembang', '081212121212', NULL, '2019-12-14', 'anugrahsakti05@gmail.com', 'anugrahsakti', 'd3ccb844ac68bc324e6c95e94c05e477', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `janjitemu`
--
ALTER TABLE `janjitemu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`sianu_id`),
  ADD KEY `sianu_id` (`sianu_id`);

--
-- Indeks untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `janjitemu`
--
ALTER TABLE `janjitemu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
  ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `reset_password` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
