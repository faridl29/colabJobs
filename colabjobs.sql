-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2020 pada 18.00
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colabjobs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apply_jobs`
--

CREATE TABLE `apply_jobs` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_jobs` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cover_letter` text NOT NULL,
  `status` enum('pending','accepted') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `apply_jobs`
--

INSERT INTO `apply_jobs` (`id`, `id_user`, `id_jobs`, `nama`, `email`, `cover_letter`, `status`) VALUES
(1, '5eb3ab405f0d36.94655000', 1, 'Ucok', 'ucok@gmail.com', 'Mau coba kolaborasi sama sampean', 'accepted'),
(2, '5eb56fd3c97a51.65094556', 1, 'Siapa aja', 'siapa@gmail.com', 'Mau coba coba kolaborasi bisnis dong', 'accepted'),
(7, '5eb56fd3c97a51.65094556', 2, 'Siapa aja', 'siapa@gmail.com', 'Bismillah', 'accepted'),
(8, '5e04896678f7e8.57119955', 12, 'Miftah Faridl', 'admin@gmail.com', 'Bang, ikut join dong', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_question` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_question`, `comment`, `date`) VALUES
(1, '5eb56fd3c97a51.65094556', 1, 'kalo dana segitu sih mending bikin toko kecil-kecilan aja dulu di depan rumah', '2020-05-09 12:00:00'),
(2, '5e04896678f7e8.57119955', 1, 'Prospeknya kira-kira bagus ga ya?', '2020-05-09 12:16:00'),
(3, '5e04896678f7e8.57119955', 1, 'Soalnya di lingkungan saya sepi banget, takutnya ga laku', '2020-05-09 13:19:12'),
(4, '5e04896678f7e8.57119955', 2, 'Mana nih ga ada yang komen', '2020-05-09 13:41:04'),
(5, '5e04896678f7e8.57119955', 2, 'komen dong!!!', '2020-05-09 13:42:37'),
(6, '5eb56fd3c97a51.65094556', 1, 'Yaudah gini aja, cari lingkungan yang strategis, terus cari kios di daerah tersebut. Coba sewa kios nya, terus jualan disana', '2020-05-09 22:40:09'),
(7, '5e04896678f7e8.57119955', 1, 'Oke deh nanti saya cari dulu, terima kasih sarannya', '2020-05-10 00:06:06'),
(8, '5eb56fd3c97a51.65094556', 15, 'tes', '2020-05-10 01:59:56'),
(9, '5eb56fd3c97a51.65094556', 1, 'Oke gan semoga sukses ya', '2020-05-10 21:10:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id_jobs` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `jenis_usaha` enum('Design & Creative','Marketing','Telemarketing','Software & Web','Administration','Teaching & Education','Engineering','Garments / Textile','Lainnya') NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `domisili` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `published` date NOT NULL,
  `dateline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jobs`
--

INSERT INTO `jobs` (`id_jobs`, `id_user`, `nama_perusahaan`, `jenis_usaha`, `judul`, `deskripsi`, `domisili`, `photo`, `contact`, `published`, `dateline`) VALUES
(1, '5e04896678f7e8.57119955', 'PT Aplikita', 'Software & Web', 'Kolaborasi Pembuatan Aplikasi Booking Online', 'Jadi aplikasinya itu seperti ini, lalu jika dibuat seperti itu, akan menjadi seperti itu, begitu juga sebaliknya jika dibuat seperti ini maka akan jadi seperti ini. Bisa remote asal minimal paham git', 'Cimahi', 'default_photo.png', '089554787543', '2020-05-05', '2020-05-14'),
(2, '5e04896678f7e8.57119955', 'PT Aplikita', 'Software & Web', 'Pembuatan Project Besar dari Pemerintah', 'Jadi aplikasinya itu seperti ini, lalu jika dibuat seperti itu, akan menjadi seperti itu, begitu juga sebaliknya jika dibuat seperti ini maka akan jadi seperti ini. Bisa remote asal minimal paham git', 'Bandung', 'default_photo.png', 'm.fahuiehf@gmail.com', '2020-05-05', '2020-05-14'),
(3, '5e04896678f7e8.57119955', 'PT Aplikita', 'Software & Web', 'Pembuatan Aplikasi Sosial Media', 'Jadi aplikasinya itu seperti ini, lalu jika dibuat seperti itu, akan menjadi seperti itu, begitu juga sebaliknya jika dibuat seperti ini maka akan jadi seperti ini. Bisa remote asal minimal paham git', 'Semarang', 'default_photo.png', '24234344234', '2020-05-05', '2020-05-27'),
(4, '5e04896678f7e8.57119955', 'PT Satu Nusa', 'Lainnya', 'Bla bla bla', 'Jadi aplikasinya itu seperti ini, lalu jika dibuat seperti itu, akan menjadi seperti itu, begitu juga sebaliknya jika dibuat seperti ini maka akan jadi seperti ini. Bisa remote asal minimal paham git', 'Cimahi', 'default_photo.png', '42343423434', '2020-05-05', '2020-05-17'),
(5, '5e04896678f7e8.57119955', 'Warung koe', 'Lainnya', 'Partner Usaha Jualan Bakso', 'Ini adalah usaha jualan bakso', 'Indramayu', 'default_photo.png', '2321323', '2020-05-05', '2020-05-13'),
(6, '5e04896678f7e8.57119955', 'PT Satu Nusa', 'Lainnya', 'bla bla bla', 'awdwawdawdwwdwdwdwdwdkugaidawdhdwhduwhduiwhdiwhduwhduwhdawhdawhduiwhdwhuwdhuwhduwdhwdhwudhwihwd', 'Bekasi', 'default_photo.png', '233213', '2020-05-05', '2020-05-18'),
(7, '5e04896678f7e8.57119955', 'PT Sahamsaya', 'Marketing', 'Tanam Modal ', 'awakhdawdiwhuiwhduwhdukwhuwdwdwdwdwdwdwdwdwdwdwdwwd', 'Karawang', 'default_photo.png', 'adjhuawdh@gmail.com', '2020-05-05', '2020-05-14'),
(8, '', 'Ini nama perusahaan', 'Engineering', 'Ini Judulnya', '<p>Bismillahirrahmanirrahim ini deskripsi</p><p><ul><li>feafef</li><li>efefef</li><li>efefef</li><li>efefef</li></ul></p>', 'cimahi', 'tandatanya.jpg', 'dadwdd', '0000-00-00', '0000-00-00'),
(9, '5eb3ab405f0d36.94655000', 'Perusahaan apa aja', 'Administration', 'Judul nya ucok', '<p>Ini deskripsi ucok</p><p><ul><li>1</li><li>2</li><li>3</li></ul></p>', 'Zimbabwed', 'android3.png', 'ucok@gmail.com', '0000-00-00', '0000-00-00'),
(11, '5eb3ab405f0d36.94655000', 'adwd', 'Design & Creative', 'wdwd', '<p>awdwd</p>', 'awdwd', 'mock_up6.jpg', 'awdw', '2020-05-08', '2012-05-20'),
(12, '5eb56fd3c97a51.65094556', 'PT Siapa aja', 'Teaching & Education', 'Bisnis untuk siapa aja', '<p>Ini adalah bisnis pertamaku, buat yang gabung boleh aja, syarat :</p><p><ul><li>?awddw<br></li><li>awdwdw</li><li>awdwd</li><li>awdwd</li></ul></p>', 'Cimahi', 'nafsu5.jpg', 'siapa@gmail.com', '2020-05-08', '2012-05-20'),
(17, '5eb56fd3c97a51.65094556', 'awdwdw', 'Administration', 'awddw', '<p>awdwdwd</p>', 'awdwd', 'maut31.jpg', 'awdwd', '2020-05-08', '2020-05-18'),
(18, '5e04896678f7e8.57119955', 'awdwdw', 'Engineering', 'awdwawdwd', '<p>awdwdwd</p>', 'Papua', 'nikah5.jpg', '1232323', '2020-05-10', '2020-05-28'),
(19, '5e04896678f7e8.57119955', 'PT Jaya Selalu', 'Administration', 'Postingan final', '<p>ini deskripsi</p><p><p><ul><li>wadwdwd</li><li>awdwdw</li><li>awdwdw</li></ul></p></p>', 'Cimahi', 'maut24.jpg', 'admin@gmail.com', '2020-05-10', '2020-05-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `id_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `message`, `date`, `id_user`) VALUES
(1, 'Permintaan kolaborasi (Kolaborasi Pembuatan Aplikasi Booking Online) disetujui!', '2020-05-08 22:09:00', '5eb3ab405f0d36.94655000'),
(5, 'Permintaan kolaborasi (Pembuatan Project Besar dari Pemerintah) diterima!', '2020-05-09 01:10:05', '5eb56fd3c97a51.65094556'),
(6, 'Permintaan kolaborasi (Kolaborasi Pembuatan Aplikasi Booking Online) diterima!', '2020-05-10 16:35:16', '5eb56fd3c97a51.65094556');

-- --------------------------------------------------------

--
-- Struktur dari tabel `question_answer`
--

CREATE TABLE `question_answer` (
  `id_question` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `detail` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `question_answer`
--

INSERT INTO `question_answer` (`id_question`, `id_user`, `title`, `detail`, `date`) VALUES
(1, '5e04896678f7e8.57119955', 'Apakah dalam setiap membuka usaha membutuhkan modal?', 'Soalnya setiap saya membuka usaha, dengan tanpa modal atau dengan modal sedikit, usaha tersebut pasti gagal. Entah itu kesalahan saya dalam mengelola usaha atau yang lainnya', '2020-05-09 08:45:00'),
(2, '5e04896678f7e8.57119955', 'Coba Bertanya', 'Ini isinya', '2020-05-09 10:42:51'),
(3, '5e04896678f7e8.57119955', 'Bisnis dengan modal 10jt', 'Saya punya modal sekitar 10jt, kira-kira bisnis apa ya yang bagus buat kedepannya, kalo bisa yang cepat untung. Terima kasih', '2020-05-09 10:47:55'),
(14, '5e04896678f7e8.57119955', 'awdwdwawdwd', 'awdwd', '2020-05-09 21:02:04'),
(15, '5eb56fd3c97a51.65094556', 'Mau nyobain diskusi ah', 'Gabut soalnya, daripada diem aja kan', '2020-05-10 01:59:40'),
(16, '5e04896678f7e8.57119955', 'Coba tanya', 'ini detail', '2020-05-10 21:09:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `telepon`, `foto`, `password`) VALUES
('5e04896678f7e8.57119955', 'Miftah Faridl', 'admin@gmail.com', '089654711175', 'maut23.jpg', 'admin123'),
('5eb3ab405f0d36.94655000', 'Coba user', 'cek@gmail.com', 'cek', 'default_profile.jpg', 'cek'),
('5eb56fd3c97a51.65094556', 'Miftah Faridl', 'siapa@gmail.com', 'siapa', 'nikah4.jpg', 'siapa'),
('5eb8234585a925.95653597', 'aaaa', 'a@gmail.com', 'aaaa', 'default_profile.jpg', 'aaaa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apply_jobs`
--
ALTER TABLE `apply_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_jobs`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`id_question`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apply_jobs`
--
ALTER TABLE `apply_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_jobs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
